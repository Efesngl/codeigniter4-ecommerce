<?php

namespace App\Controllers;

use CodeIgniter\Model;
use Config\App;
use Exception;
use PHPUnit\Util\Printer;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class Home extends BaseController
{
    private $db;
    private $contact_info;
    private $about_us_model;
    private $customer_model;
    private $address_model;
    private $wishlist_model;
    private $product_model;
    private $cart_model;
    private $cart_data;
    private $slider_model;
    private $ootw;
    private $social_media;
    public $contact_info_data;
    public $social_media_data;
    public $site_general_data;
    public $site_general;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->customer_model = new \App\Models\Customer();
        $this->about_us_model = new \App\Models\About_us();
        $this->address_model = new \App\Models\Addresses();
        $this->wishlist_model = new \App\Models\Wishlist();
        $this->product_model = new \App\Models\Products();
        $this->cart_model = new \App\Models\Cart();
        $this->slider_model = new \App\Models\Slider_model();
        $this->ootw = new \App\Models\Ootw();
        $this->contact_info = new \App\Models\Contact_info();
        $this->social_media = new \App\Models\Social_media();
        $this->site_general=new \App\Models\Site_general();
        $this->contact_info_data=["contact_info" =>$this->contact_info->select("phone_number,address,email")->find(1)];
        $this->social_media_data=["social_media"=>$this->social_media->select("facebook,instagram,twitter,tiktok,youtube")->find(1)];
        $this->site_general_data=["site_general"=>$this->site_general->select("logo,favicon,footer_text,copyright,header_text")->find(1)];
        session();
        if (isset($_COOKIE["remember_id"])) {
            session()->set("ID", $_COOKIE["remember_id"]);
            session()->set("logged", 1);
        }
        if ((session()->has("ID")) && (session()->has("logged"))) {
            if($this->customer_model->where("ID",session()->get("ID"))->countAllResults()==0){
                session()->remove("ID");
                session()->remove("logged");
            }else{
                $this->cart_data = $this->cart_model->where("customer_id", $_SESSION["ID"])->countAllResults();
            }
        } else {
            if (!isset($_COOKIE["aid"])) {
                session()->set("aid", uniqid("", true));
                setcookie("aid", session()->get("aid"), time() + (365 * 24 * 60 * 60), "/");
                $this->cart_data = $this->cart_model->where("customer_id", session()->get("aid"))->countAllResults();
                session()->remove("aid");
            } else {
                $this->cart_data = $this->cart_model->where("customer_id", $_COOKIE["aid"])->countAllResults();
            }
        }
    }
    public function is_logged(){
        if(!session()->has("ID") && !session()->has("logged")){
            return false;
        }
        return true;

    }
    public function index()
    {
        $data = [
            "cart_count" => $this->cart_data,
            "categories" => [],
            "slider" => [],
            "newest_products" => [],
            "popular_products" => [],
            "ootw" => [
                "header_1" => "",
                "header_2" => "",
                "text" => "",
                "offer_end" => "",
                "offer_link" => "",
                "image" => ""
            ],
            "choose_us" => [
                "image_1" => "",
                "header" => "",
                "text" => ""
            ],
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data
        ];
        $categories = $this->db->query("SELECT category,parent_id FROM product_categories")->getResultArray();
        foreach ($categories as $cat) {
            # code...
            if ($cat["parent_id"] == "0") {
                array_push($data["categories"], $cat["category"]);
            }
        }
        $sliders = $this->slider_model->findAll();
        foreach ($sliders as $s) {
            if ($s["is_active"] == "1") {
                $data["slider"][$s["ID"]]["header"] = $s["header"];
                $data["slider"][$s["ID"]]["image"] = $s["image"];
                $data["slider"][$s["ID"]]["text"] = $s["text"];
            }
        }
        $new_products = $this->product_model
            ->select("products.ID,product_name,image,product_price,is_discounted,discounted_price")
            ->join("product_images", "product_images.product=products.ID", "inner")
            ->where(["is_new" => 1, "is_main" => 1])
            ->findAll();
        foreach ($new_products as $np) {
            # code...
            $data["newest_products"][$np["ID"]]["ID"] = $np["ID"];
            $data["newest_products"][$np["ID"]]["product_name"] = $np["product_name"];
            $data["newest_products"][$np["ID"]]["product_images"] = $np["image"];
            $data["newest_products"][$np["ID"]]["product_price"] = $np["product_price"];
            if ($this->wishlist_model->where(["customer_id" => $_COOKIE["aid"] ?? session()->get("ID"), "product_id" => $np["ID"]])->countAllResults() > 0) {
                $data["newest_products"][$np["ID"]]["is_wishlisted"] = true;
            }
            if ($np["is_discounted"] == 1) {
                $data["newest_products"][$np["ID"]]["discounted_price"] = $np["discounted_price"];
            }
        }
        $popular_products = $this->product_model
            ->select("products.ID,product_name,image,product_price,is_discounted,discounted_price")
            ->join("product_images", "product_images.product=products.ID", "inner")
            ->where("is_main", 1)
            ->orderBy("total_selled", "ASC")
            ->findAll(4);
        foreach ($popular_products as $pp) {
            # code...
            $data["popular_products"][$pp["ID"]]["ID"] = $pp["ID"];
            $data["popular_products"][$pp["ID"]]["product_name"] = $pp["product_name"];
            $data["popular_products"][$pp["ID"]]["product_images"] = $pp["image"];
            $data["popular_products"][$pp["ID"]]["product_price"] = $pp["product_price"];
            if ($this->wishlist_model->where(["customer_id" => $_COOKIE["aid"] ?? session()->get("ID"), "product_id" => $pp["ID"]])->countAllResults() > 0) {
                $data["popular_products"][$pp["ID"]]["is_wishlisted"] = true;
            }
            if ($pp["is_discounted"] == 1) {
                $data["popular_products"][$pp["ID"]]["discounted_price"] = $pp["discounted_price"];
            }
        }
        $ootw = $this->ootw->findAll();
        foreach ($ootw as $o) {
            # code...
            $data["ootw"]["header_1"] = $o["header_1"];
            $data["ootw"]["header_2"] = $o["header_2"];
            $data["ootw"]["image"] = $o["image"];
            $data["ootw"]["offer_link"] = $o["offer_link"];
            $data["ootw"]["offer_end"] = date("M j, Y H:i:s", strtotime($o["offer_end"]));
            $data["ootw"]["text"] = $o["text"];
        }
        $choose_us = $this->about_us_model->findAll();
        foreach ($choose_us as $cu) {
            # code...
            $data["choose_us"]["image_1"] = $cu["media_1"];
            $data["choose_us"]["header"] = $cu["header_1"];
            $data["choose_us"]["text"] = $cu["content"];
        }
        return view('index', $data);
    }
    public function login()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            if ($_POST["email"] != "" && $_POST["password"] != "") {
                $email = $_POST["email"];
                $pass = md5($_POST["password"]);
                $user = $this->customer_model;
                if ($user->where(["email" => $email, "password" => $pass])->countAllResults() > 0) {
                    $user_id = $user->where(["email" => $email, "password" => $pass])->find()[0]["ID"];
                    $awl = $this->wishlist_model;
                    $asc = $this->cart_model;
                    if ($awl->where("customer_id", $_COOKIE["aid"])->countAllResults() > 0) {
                        $awl->set(["customer_id" => $user_id[0]])->where("customer_id", $_COOKIE["aid"])->update();
                    }
                    if ($asc->where("customer_id", $_COOKIE["aid"])->countAllResults() > 0) {
                        $asc->set("customer_id", $user_id)->where("customer_id", $_COOKIE["aid"])->update();
                    }
                    session()->set("ID", $user_id);
                    session()->set("logged", 1);
                    if (isset($_POST["remember_me"])) {
                        setcookie("remember_id", $user_id, time() + 3600, "/");
                    }
                    return redirect()->to("hesap");
                } else {
                    return redirect()->to("giris");
                }
            } else {
                return redirect()->to("giris");
            }
        } else {
            return redirect()->to("giris");
        }
    }
    public function login_view()
    {
        $data = [
            "cart_count" => $this->cart_data,
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data
        ];
        if (session()->has("logged") && session()->has("ID")) {
            return redirect()->to("hesap");
        } else {
            return view("account/login", $data);
        }
    }
    public function logout()
    {
        if (session()->has("logged") && session()->has("ID")) {
            session()->remove("ID");
            session()->remove("logged");
            if (isset($_COOKIE["remember_id"])) {
                setcookie("remember_id", "", time() - 3600, "/");
            }
            return redirect()->to("giris");
        } else {
            return redirect()->to("/");
        }
    }
    public function register_view()
    {
        $data = [
            "cart_count" => $this->cart_data,
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data
        ];
        if (session()->has("logged") && session()->has("ID")) {
            return redirect()->to("hesap");
        } else {
            return view("account/register", $data);
        }
    }
    public function register()
    {
        if ($this->request->isAJAX()) {
            $user_info = $this->request->getVar();
            $data = [
                "first_name" => $user_info->first_name,
                "last_name" => $user_info->last_name,
                "full_name" => $user_info->first_name . " " . $user_info->last_name,
                "email" => $user_info->email,
                "password" => md5($user_info->password),
                "ip"=>$_SERVER['REMOTE_ADDR']
            ];
            try {
                $this->customer_model->insert($data);
            } catch (Exception $e) {
                echo $e->getCode();
            }
            $awl = $this->wishlist_model;
            $asc = $this->cart_model;
            if ($this->db->affectedRows() > 0) {
                $user_id = $this->customer_model->where("email", $data["email"])->findColumn("ID");
                if ($awl->where("customer_id", $_COOKIE["aid"])->countAllResults() > 0) {
                    $awl->set(["customer_id" => $user_id[0]])->where("customer_id", $_COOKIE["aid"])->update();
                }
                if ($asc->where("customer_id", $_COOKIE["aid"])->countAllResults() > 0) {
                    $asc->set("customer_id", $user_id)->where("customer_id", $_COOKIE["aid"])->update();
                }
                session()->set("ID", $user_id[0]);
                session()->set("logged", 1);
                echo true;
            }
        }
        // echo $_COOKIE["aid"];
        die();
    }
    public function contact()
    {
        $data = [
            "cart_count" => $this->cart_data,
            "contact_info" => $this->contact_info->select("phone_number,phone_number2,google_maps,email,address")->find(1),
            "social_media" => $this->social_media->select("instagram,facebook,twitter,youtube,tiktok")->find(1),
            ...$this->site_general_data
        ];
        return view("contact", $data);
    }
    public function about_us()
    {
        $about_us = $this->about_us_model->findAll();
        $data = [
            "cart_count" => $this->cart_data,
            "media_1" => "",
            "header_1" => "",
            "header_2" => "",
            "content" => "",
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data
        ];
        foreach ($about_us as $ab) {
            $data["media_1"] = $ab["media_1"];
            $data["header_1"] = $ab["header_1"];
            $data["header_2"] = $ab["header_2"];
            $data["content"] = $ab["content"];
        }
        return view("about", $data);
    }
    public function shop()
    {
        $data = [
            "cart_count" => $this->cart_data,
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data
        ];
        return view("shop/shop", $data);
    }
    public function checkout()
    {
        if(!$this->is_logged()){
            return redirect()->to("sepet");
        }
        if (session()->has("logged") && session()->has("ID")) {
            $products = $this->cart_model   
                    ->select("product_images.image,products.product_name,products.product_price,products.ID,products.is_discounted,products.discounted_price,shopping_cart.quantity")
                    ->join("products", "products.ID=shopping_cart.product_id")
                    ->join("product_images","product_images.product=products.ID")
                    ->where(["shopping_cart.customer_id"=>$_SESSION["ID"],"is_main"=>1])
                    ->findAll();
            if(count($products)==0){
                return redirect()->to("sepet");
            }
            $total=$this->cart_model
                    ->select("sum(products.product_price*shopping_cart.quantity) as 'sum'")
                    ->join("products", "products.ID=shopping_cart.product_id")
                    ->where("shopping_cart.customer_id",$_SESSION["ID"])
                    ->findAll()[0]["sum"];
            $data = [
                "cart_count" => $this->cart_data,
                "products" => $products,
                "subtotal" => 0,
                "shipping_price" => 50,
                "total" => $total,
                "addresses" => $this->address_model->where("customer_id",$_SESSION["ID"])->findAll(),
                ...$this->contact_info_data,
                ...$this->social_media_data,
                ...$this->site_general_data,
            ];

            foreach ($data["products"] as $key=>$value) {
                # code...
                if($value["is_discounted"]==1){
                    $data["products"][$key]["discounted_total"]=$value["discounted_price"]*$value["quantity"];
                    $data["subtotal"]+=$value["discounted_price"]*$value["quantity"];
                }
                else{
                    $data["products"][$key]["total"]=$value["product_price"]*$value["quantity"];
                    $data["subtotal"]+=$value["product_price"]*$value["quantity"];
                }
            }
            if($data["subtotal"]>200 || $data["total"]>200){
                $data["shipping_price"]=0;
            }
        } else {
            return redirect()->to("sepet");
        }
        return view("shop/checkout", $data);
    }
    public function privacy_policy()
    {
        $data = [
            "cart_count" => $this->cart_data,
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data
        ];
        return view("other/privacy_policy", $data);
    }
}
