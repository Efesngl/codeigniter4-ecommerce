<?php

namespace App\Controllers;


class Wishlist extends BaseController{
    public $product_model;
    public $cart_model;
    public $customer_model;
    public $wishlist_model;
    public $cart_data;
    public $db;
    public $contact_info_data;
    public $social_media_data;
    public $site_general_data;
    public $social_media;
    public $site_general;
    public $contact_info;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->product_model = new \App\Models\Products();
        $this->cart_model = new \App\Models\cart();
        $this->customer_model = new \App\Models\Customer();
        $this->wishlist_model = new \App\Models\Wishlist();
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
        helper("cookie");
    }
    public function index()
    {
        $data = [
            "cart_count" => $this->cart_data,
            "product_id" => [],
            "product_name" => [],
            "product_price" => [],
            "product_color" => [],
            "product_images"=>[],
            "product_status" => [],
            "product_status_number" => [],
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data,
        ];
        if (isset($_SESSION["logged"]) && isset($_SESSION["ID"])) {
            $user_wishlist = $this->wishlist_model->where('customer_id', session()->get("ID"))->findAll();
        } else {
            $user_wishlist = $this->wishlist_model->where('customer_id', $_COOKIE["aid"])->findAll();
        }
        foreach ($user_wishlist as $uw) {
            # code...
            $product = $this->product_model
            ->select("products.ID,product_name,product_price,color,status,product_status,image")
            ->join("product_colors","product_colors.ID=products.product_color","inner")
            ->join("product_statuses","product_statuses.ID=products.product_status","inner")
            ->join("product_images","product_images.product=products.ID","inner")
            ->where("product_images.is_main","1")
            ->find($uw["product_id"]);
            array_push($data["product_images"],$product["image"]);
            array_push($data["product_id"], $product["ID"]);
            array_push($data["product_name"], $product["product_name"]);
            array_push($data["product_price"], number_format($product["product_price"], 2, ",", "."));
            array_push($data["product_color"], $product["color"]);
            array_push($data["product_status"], $product["status"]);
            array_push($data["product_status_number"], $product["product_status"]);
        }
        return view("shop/wishlist", $data);
    }
    public function removeFromWishlist(){
        if($this->request->isAJAX()){
            $wl=[
                "product_id"=>$_POST["product_id"]
            ];
            if(session()->has("logged") && session()->has("ID")){
                $wl["customer_id"]=session()->get("ID");
                $this->wishlist_model->where($wl)->delete();
            }
            else{
                $wl["customer_id"]=$_COOKIE["aid"];
                $this->wishlist_model->where($wl)->delete();
            }
            if($this->db->affectedRows()>0){
                echo 1;
            }
        }
    }
    public function addToChart(){
        if ($this->request->isAJAX()) {
            $array = [
                "product_id" => $_POST["product_id"]
            ];
            if (session()->has("logged") && session()->has("ID")) {
                $array["customer_id"] = session()->get("ID");
            } else {
                $array["customer_id"] = $_COOKIE["aid"];
            }
            if ($this->cart_model->where($array)->countAllResults() > 0) {
                $this->cart_model->set("quantity", "quantity+1", false)->where($array)->update();
            } else {
                $this->cart_model->insert($array);
            }
            if ($this->db->affectedRows() > 0) {
                $json = [
                    "response" => 1,
                    "cart_count" => $this->cart_model->where("customer_id", $array["customer_id"])->countAllResults()
                ];
                echo json_encode($json);
            }
        }
        die();
    }
}