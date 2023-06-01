<?php

namespace App\Controllers;

use App\Libraries\Iyzico;
use App\Models\Customer;
use Exception;

class Cart extends BaseController
{
    public $cart_data;
    public $cities_model;
    public $cart_model;
    public $product_model;
    public $customer_model;
    public $address_model;
    public $orders_model;
    public $order_pr_model;
    public $db;
    public $discount_model;
    public $contact_info_data;
    public $social_media_data;
    public $site_general_data;
    public $social_media;
    public $site_general;
    public $contact_info;
    
    public function __construct()
    {
        $this->product_model = new \App\Models\Products();
        $this->db = \Config\Database::connect();
        $this->cart_model = new \App\Models\Cart();
        $this->customer_model = new \App\Models\Customer();
        $this->address_model = new \App\Models\Addresses();
        $this->orders_model = new \App\Models\Orders();
        $this->order_pr_model = new \App\Models\Order_products();
        $this->discount_model = new \App\Models\Discounts();
        $this->cities_model=new \App\Models\Cities_model();
        $this->contact_info=new \App\Models\Contact_info();
        $this->site_general=new \App\Models\Site_general();
        $this->social_media=new \App\Models\Social_media();
        $this->contact_info_data=["contact_info" =>$this->contact_info->select("phone_number,address,email")->find(1)];
        $this->social_media_data=["social_media"=>$this->social_media->select("facebook,instagram,twitter,tiktok,youtube")->find(1)];
        $this->site_general_data=["site_general"=>$this->site_general->select("logo,favicon,footer_text,copyright,header_text")->find(1)];
        session();
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
        $customer_id = $_COOKIE["aid"];
        if (session()->has("ID") && session()->has("logged")) {
            $customer_id = session()->get("ID");
        }
        $cart_items = $this->cart_model->select("shopping_cart.quantity,products.ID,products.product_name,products.product_price,products.is_discounted,products.discounted_price,product_images.image,product_statuses.status,product_colors.color")
        ->join("products","products.ID=shopping_cart.product_id")
        ->join("product_images", "product_images.product=products.ID", "inner")
        ->join("product_statuses", "products.product_status=product_statuses.ID", "inner")
        ->join("product_colors", "products.product_color=product_colors.ID", "inner")
        ->where(["product_images.is_main" => "1","shopping_cart.customer_id"=>$customer_id])->findAll();
        $data = [
            "cart_count" => $this->cart_data,
            "products"=> $cart_items,
            "subtotal" => 0,
            "total" => $this->cart_model
            ->select("sum(products.product_price*quantity) as 'total'")
            ->join("products","products.ID=shopping_cart.product_id")
            ->where("customer_id",$customer_id)
            ->find()[0]["total"],
            "shipping_price" => 0,
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data,
        ];


        foreach ($data["products"] as $key=>$item) {
                if ($item["is_discounted"] == "1") {
                    $data["products"][$key]["discounted_price"]= $item["discounted_price"];
                    $data["subtotal"] += ($item["quantity"] * $item["discounted_price"]);
                    $data["products"][$key]["discounted_total"]= $item["quantity"] * $item["discounted_price"];
                } else {
                    $data["products"][$key]["product_total"]= $item["quantity"] * $item["product_price"];
                    $data["subtotal"] += $item["quantity"] * $item["product_price"];
                }
        }

        if ($data["total"] >= 250) {
            $data["shipping_price"] = 0;
        } else {
            $data["shipping_price"] = 30;
            $data["total"] += $data["shipping_price"];
        }
        // echo "<pre>";
        // print_r($data);die();

        return view("shop/cart", $data);
    }
    public function quantity($product_id, $value)
    {
        if(!$this->is_logged()){
            return redirect()->to("sepet");
        }
        if (session()->has("ID") && session()->has("logged")) {
            $arr = [
                "product_id" => $product_id,
                "customer_id" => $_SESSION["ID"],
            ];
            if ($value == 0) {
                $this->cart_model->where($arr)->delete();
            } else {
                $this->cart_model->set("quantity", $value)->where($arr)->update();
            }
            return redirect()->to("sepet");
        } else {
            $arr = [
                "product_id" => $product_id,
                "customer_id" => $_COOKIE["aid"],
            ];
            if ($value == 0) {
                $this->cart_model->where($arr)->delete();
            } else {
                $this->cart_model->set("quantity", $value)->where($arr)->update();
            }
            return redirect()->to("sepet");
        }
    }
    public function set_discount()
    {
        if ($this->request->isAJAX()) {
            $dc = $_POST["dc"];
            $json = [
                "used_discount_code" => "",
                "cart_sum" => 0,
                "products" => []
            ];
            if ($this->discount_model->where(["code"=>$dc,"is_active"=>1])->countAllResults() > 0) {
                $discount_code = $this->discount_model->where("code", $dc)->find()[0];
                    $json["used_discount_code"] = $discount_code["code"];
                    $products=$this->cart_model
                    ->select("products.ID,product_name,product_price,quantity,product_categories.category,is_discounted,discounted_price")
                    ->join("products","products.ID=shopping_cart.product_id")
                    ->join("product_categories","products.product_category=product_categories.ID")
                    ->where("customer_id",$_SESSION["ID"])
                    ->findAll();
                    if ($discount_code["discount_type"] == 1) {
                        foreach ($products as $p) {
                            # code...
                            $json["products"][$p["ID"]]["ID"]=$p["ID"];
                            $json["products"][$p["ID"]]["product_name"]=$p["product_name"];
                            $json["products"][$p["ID"]]["quantity"]=$p["quantity"];
                            $json["products"][$p["ID"]]["category"]=$p["category"];
                            $json["products"][$p["ID"]]["product_name"]=$p["product_name"];
                            if($p["is_discounted"]==1){
                                $product_price=(($p["discounted_price"]*$p["quantity"])-($p["discounted_price"]*$p["quantity"])/100*$discount_code["discount"]);
                            }
                            else{
                                $product_price=(($p["product_price"]*$p["quantity"])-($p["product_price"]*$p["quantity"])/100*$discount_code["discount"]);
                            }
                            $json["products"][$p["ID"]]["discounted_price"]=$product_price;
                            $json["cart_sum"]+=$product_price;;
                        }
                    } else {
                        $cart_item_count = $this->cart_model->where("customer_id", $_SESSION["ID"])->countAllResults();
                        $dpp = $discount_code["discount"] / $cart_item_count;
                        foreach ($products as $p) {
                            # code...
                            $json["products"][$p["ID"]]["ID"]=$p["ID"];
                            $json["products"][$p["ID"]]["product_name"]=$p["product_name"];
                            $json["products"][$p["ID"]]["quantity"]=$p["quantity"];
                            $json["products"][$p["ID"]]["category"]=$p["category"];
                            $json["products"][$p["ID"]]["product_name"]=$p["product_name"];
                            if($p["is_discounted"]==1){
                                $product_price=(($p["discounted_price"]*$p["quantity"])-$dpp);
                            }
                            else{
                                $product_price=(($p["product_price"]*$p["quantity"])-$dpp);
                            }
                            $json["products"][$p["ID"]]["discounted_price"]=$product_price;
                            $json["cart_sum"]+=$product_price;;
                        }
                    }
                    echo json_encode($json);
            } else {
                echo "invalid code";
            }
            // try {

            // } catch (Exception $e) {
            //     echo $e->getMessage();
            //     die();
            // }
        }
    }
    public function status($status)
    {
        if(!$this->is_logged()){
            return redirect()->to("sepet");
        }
        $json = [
            "cart_count" => $this->cart_data,
            "error" => "",
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data,
        ];
        if($status==1){
            return view("Payment/success", $json);
        }
        return view("Payment/failure", $json);
        
    }
    public function payment()
    {
        if ($this->request->isAJAX()) {
            if (session()->has("logged") && session()->has("ID")) {
                $json=$this->request->getJSON();
                $address=$this->address_model->where("ID",$json->address_id)->find()[0];
                $customer=$this->customer_model->where("ID", $_SESSION["ID"])->find()[0];
                $arr = [
                    "conservation" => $_SESSION["ID"] . uniqid(),
                    "total" => 0,
                    "card" => [
                        "card_holder" => $json->card_holder,
                        "card_number" => $json->card_number,
                        "card_expire_month" => $json->card_month,
                        "card_expire_year" => $json->card_year,
                        "cvc" => $json->cvc
                    ],
                    "buyer" => [
                        "ID" => $_SESSION["ID"],
                        "name" => $customer["first_name"],
                        "surname" => $customer["last_name"],
                        "phone_number" => $address["phone_number"],
                        "email" => $customer["email"],
                        "address" => $address["full_address"],
                        "IP" => $this->request->getIPAddress(),
                        "city" => $this->cities_model->where("ID",$address["city"])->find()[0]["city"],
                        "country" => "Türkiye",
                    ],
                    "basket" => [],
                    "is_discounted"=>0
                ];
                if (isset($json->discountedData)) {
                    $arr["is_discounted"]=1;
                    $arr["used_discount_code"]=$json->discountedData->used_discount_code;
                    $arr["total"]=$json->discountedData->cart_sum;
                    foreach ($json->discountedData->products as $p) {
                        # code..
                        $arr["basket"][$p->ID]["ID"]=$p->ID;
                        $arr["basket"][$p->ID]["name"]=$p->product_name;
                        $arr["basket"][$p->ID]["category"]=$p->category;
                        $arr["basket"][$p->ID]["price"]=$p->discounted_price;
                        $arr["basket"][$p->ID]["quantity"]=$p->quantity;
                    }
                }
                else{
                    $cart=$this->cart_model->select("products.ID,products.product_name,product_categories.category,products.product_price,is_discounted,discounted_price,shopping_cart.quantity")->join("products","products.ID=shopping_cart.product_id")->join("product_categories","products.product_category=product_categories.ID")->where("customer_id",$_SESSION["ID"])->findAll();
                    foreach ($cart as $p) {
                        # code..
                        $arr["basket"][$p["ID"]]["ID"]=$p["ID"];
                        $arr["basket"][$p["ID"]]["name"]=$p["product_name"];
                        $arr["basket"][$p["ID"]]["category"]=$p["category"];
                        if($p["is_discounted"]!=1){
                            $arr["basket"][$p["ID"]]["price"]=$p["product_price"]*$p["quantity"];
                            $arr["total"]+=$p["product_price"]*$p["quantity"];
                        }
                        else{
                            $arr["basket"][$p["ID"]]["price"]=$p["discounted_price"]*$p["quantity"];
                            $arr["total"]+=$p["discounted_price"]*$p["quantity"];
                        }
                        $arr["basket"][$p["ID"]]["quantity"]=$p["quantity"];
                    }
                }
                $iyzico=new Iyzico;
                echo $iyzico->payment($arr);
            }
        }
    }
    public function clear_cart()
    {
        if(!$this->is_logged()){
            return redirect()->to("sepet");
        }
        $arr = [
            "customer_id" => $_SESSION["ID"] ?? $_COOKIE["aid"],
        ];
        $this->cart_model->where($arr)->delete();
        return redirect()->to("sepet");
    }
    public function delete_item($product_id)
    {
        if(!$this->is_logged()){
            return redirect()->to("sepet");
        }
        $arr = [
            "product_id" => $product_id
        ];
        if (session()->has("logged") && session()->has("ID")) {
            $arr["customer_id"] = $_SESSION["ID"];
            $this->cart_model->where($arr)->delete();
            return redirect()->to("sepet");
        } else {
            $arr["customer_id"] = $_COOKIE["aid"];
            $this->cart_model->where($arr)->delete();
            return redirect()->to("sepet");
        }
    }
}
