<?php

namespace App\Controllers;

class Shop extends BaseController
{
    private $product_model;
    private $contact_info;
    private $site_email;
    private $site_address;  
    private $site_phone_number;
    private $brands_model;
    private $cart_model;
    private $wishlist_model;
    private $cart_data;
    private $product_images;
    private $db;
    private $categories_model;
    private $product_desc_model;
    private $product_comments;
    public $contact_info_data;
    public $social_media_data;
    public $site_general_data;
    public $social_media;
    public $site_general;
    public $customer_model;
    public function __construct()
    {
        $this->customer_model = new \App\Models\Customer();
        $this->db = \Config\Database::connect();
        $this->product_model = new \App\Models\Products();
        $this->cart_model = new \App\Models\Cart();
        $this->wishlist_model = new \App\Models\Wishlist();
        $this->product_images = new \App\Models\Product_images();
        $this->brands_model = new \App\Models\Brands_model();
        $this->categories_model = new \App\Models\Categories_model();
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
            $this->cart_data = $this->cart_model->where("customer_id", $_COOKIE["aid"])->countAllResults();
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
        $limit = 10;
        $data = [
            "cart_count" => $this->cart_data,
            "categories" => $this->buildTree(0),
            "brands" => [],
            "brands_id" => [],
            "is_mobile" => false,
            'product_paginate' => $this->product_model->paginate($limit),
            'pager' => $this->product_model->pager,
            "start",
            "finish",
            "product_count" => $this->product_model->countAllResults(),
            "product_images" => [],
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data

        ];
        // echo "<pre>";
        // print_r($data["categories"]);
        // die();
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }
        $start = ($_GET["page"] - 1) * $limit;
        $data["start"] = $start;

        $agent = $this->request->getUserAgent();
        if ($agent->isMobile()) {
            $data["is_mobile"] = true;
        }
        $brands = $this->brands_model->findAll();
        foreach ($brands as $brand) {
            # code...
            array_push($data["brands_id"], $brand["ID"]);
            array_push($data["brands"], $brand["brand"]);
        }

        $query = [];
        $like = [];
        $brands = [];
        $cats = [];
        $sp = "";
        if (isset($_GET["price_min"]) && !isset($_GET["price_max"])) {
            $query["product_price>="] = $_GET["price_min"];
        }
        if (isset($_GET["price_min"]) && isset($_GET["price_max"])) {
            $query["product_price>="] = $_GET["price_min"];
            $query["product_price<="] = $_GET["price_max"];
        }
        if (!isset($_GET["price_min"]) && isset($_GET["price_max"])) {
            $query["product_price<="] = $_GET["price_max"];
        }
        $this->product_model
            ->select("products.ID,product_name,product_price,color,image,is_new,is_discounted,discounted_price")
            ->join("product_images", "product=products.ID", "inner")
            ->join("product_colors", "product_color=product_colors.ID")
            ->where($query)
            ->where("is_main", 1)
            ->where("product_status",1);
        if (isset($_GET["brands"])) {
            $brands = explode(",", $_GET["brands"]);
            $this->product_model->whereIn("product_brand", $brands);
        }
        if (isset($_GET["categories"])) {
            $cats = explode(",", $_GET["categories"]);
            $this->product_model->whereIn("product_category", $cats);
        }
        if (isset($_GET["sp"])) {
            $sp = $_GET["sp"];
            $this->product_model->like("product_name", $sp);
        }
        if (isset($_GET["sorting"])) {
            switch ($_GET["sorting"]) {
                case "newest":
                    $this->product_model->orderBy("is_new", "DESC");
                    break;
                case "most_selled":
                    $this->product_model->orderBy("total_selled", "DESC");
                    break;
                case "price_asc":
                    $this->product_model->orderBy("product_price", "ASC");
                    break;
                case "price_desc":
                    $this->product_model->orderBy("product_price", "DESC");
                    break;
            }
        }
        $products = $this->product_model->findAll();
        foreach ($products as $p) {
            # code...
                $data["products"][$p["ID"]]["is_wishlisted"]=false;
                $data["products"][$p["ID"]]["product_id"] =$p["ID"];
                $data["products"][$p["ID"]]["product_name"] =$p["product_name"];
                $data["products"][$p["ID"]]["product_color"]= $p["color"];
                $data["products"][$p["ID"]]["product_price"]= $p["product_price"];
                $data["products"][$p["ID"]]["is_discounted"] =$p["is_discounted"];
                $data["products"][$p["ID"]]["discounted_price"]= $p["discounted_price"];
                $data["products"][$p["ID"]]["is_new"] =$p["is_new"];
                $data["products"][$p["ID"]]["product_images"]= $p["image"];
                if($this->wishlist_model->where(["customer_id"=>$_COOKIE["aid"] ?? session()->get("ID"),"product_id"=>$p["ID"]])->countAllResults()>0){
                    $data["products"][$p["ID"]]["is_wishlisted"]=true;
                }
        }
        return view("shop/shop", $data);
    }


    public function product($pn)
    {
        $this->product_desc_model=new \App\Models\Product_desc();
        $this->product_comments=new \App\Models\Product_comments();
        $product = $this->product_model
        ->where("product_name", $pn)->find()[0];
        $data = [
            "cart_count" => $this->cart_data,
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data,
            "product"=>[
                "ID"=>0,
                "avrage"=>0.0,
                "product_brand"=>"",
                "product_category"=>"",
                "is_customer_already_commented"=>false,
                "product_name"=>"",
                "product_price"=>0,
                "product_status"=>0,
                "product_desc"=>$this->product_desc_model->where("product_id",$product["ID"])->find()[0]["desc"] ?? "",
                "is_wishlisted"=>false,
                "images"=>[],
                "comments"=>[],
                "features"=>[]
            ]
        ];
        $product_images=$this->product_images->select("ID,image,is_main")->where("product",$product["ID"])->findAll();
        $data["product"]["ID"]=$product["ID"];
        $data["product"]["product_brand"]=$product["product_brand"];
        $data["product"]["product_category"]=$product["product_category"];
        $data["product"]["product_name"]=$product["product_name"];
        if($product["is_discounted"]==1){
            $data["product"]["discounted_price"]=number_format($product["discounted_price"],2,",",".");
        }
        $data["product"]["product_price"]=number_format($product["product_price"],2,",",".");
        $data["product"]["product_status"]=$product["product_status"];
        foreach ($product_images as $pi) {
            # code...
            $data["product"]["images"][$pi["ID"]]["image"]=$pi["image"];
            $data["product"]["images"][$pi["ID"]]["is_main"]=$pi["is_main"];
        }
        //is wishlisted
        $wishlist_arr=[
            "customer_id"=>$_COOKIE["aid"],
            "product_id"=>$product["ID"]
        ];
        if(session()->has("ID") && session()->has("logged")){
            $wishlist_arr["customer_id"]=session()->get("ID");
        }
        if($this->wishlist_model->where($wishlist_arr)->countAllResults()>0){
            $data["product"]["is_wishlisted"]=true;
        }
        //product comments
        $product_comments=$this->product_comments->select("customer.full_name,product_comments.ID,product_comments.comment,product_comments.star,product_comments.date,product_comments.customer_id")
        ->join("customer","customer.ID=product_comments.customer_id")
        ->where("product_id",$product["ID"])
        ->findAll();
        $product_star_avrage=$this->product_comments->select("SUM(product_comments.star)/count(product_comments.comment) as 'ortalama'")->find()[0];
        $data["product"]["avrage"]=number_format($product_star_avrage["ortalama"],1,".",",");
        foreach ($product_comments as $pc) {
            # code...
            if(isset($_SESSION["ID"]) && isset($_SESSION["logged"])){
                if($pc["customer_id"]==$_SESSION["ID"]){
                    $data["product"]["user_comment"]["comment_id"]=$pc["ID"];
                    $data["product"]["user_comment"]["comment"]=$pc["comment"];
                    $data["product"]["user_comment"]["star"]=$pc["star"];
                    $data["product"]["user_comment"]["customer"]=$pc["full_name"];
                    $data["product"]["user_comment"]["date"]=$pc["date"];
                }
            }
            $data["product"]["comments"][$pc["ID"]]["comment_id"]=$pc["ID"];
            $data["product"]["comments"][$pc["ID"]]["comment"]=$pc["comment"];
            $data["product"]["comments"][$pc["ID"]]["star"]=$pc["star"];
            $data["product"]["comments"][$pc["ID"]]["customer"]=$pc["full_name"];
            $data["product"]["comments"][$pc["ID"]]["date"]=$pc["date"];

        }
        return view("product/product-details", $data);
    }

    function buildTree($parent_id = 0)
    {
        $categories = $this->categories_model->where("parent_id", $parent_id)->findAll();
        $branch = [];
        foreach ($categories as $cat) {
            # code...
            if ($cat["parent_id"] == $parent_id) {
                $child = $this->buildTree($cat["ID"]);
                if ($child) {
                    $cat["child"] = $child;
                }
                $branch[] = $cat;
            }
        }
        return $branch;
    }

    public function addToCart()
    {
        if ($this->request->isAJAX()) {
            $array = [
                "product_id"=>$_POST["product_id"] ?? $this->product_model->select("ID")->where("product_name",$_POST["product_name"])->find()[0]["ID"],
                "customer_id"=>$_COOKIE["aid"]
            ];
            if (session()->has("logged") && session()->has("ID")) {
                $array["customer_id"] = session()->get("ID");
            }
            if ($this->cart_model->where($array)->countAllResults() > 0) {
                if(!isset($_POST["quantity"])){
                    $this->cart_model->set("quantity", "quantity+1", false)->where($array)->update();
                }
                else{
                    $this->cart_model->set("quantity", "quantity+{$_POST["quantity"]}" ,false)->where($array)->update();
                }
                
            } else {
                if(isset($_POST["quantity"])){
                    $array["quantity"]=$_POST["quantity"];
                }
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
    public function addToWishlist()
    {
        if ($this->request->isAJAX()) {
            $json = [
                "status" => 0,
            ];
            $array = [
                "product_id" => $_POST["product_id"] ?? $this->product_model->select("ID")->where("product_name",$_POST["product_name"])->find()[0]["ID"],
                "customer_id"=>$_COOKIE["aid"]
            ];
            if (session()->has("logged") && session()->has("ID")) {
                $array["customer_id"] = session()->get("ID");
            }
            if ($this->wishlist_model->where($array)->countAllResults() == 0) {
                $this->wishlist_model->insert($array);
                $json["status"] = 1;
            }
            else{
                $this->wishlist_model->where($array)->delete();
                $json["status"]=2;
            }
            echo json_encode($json);
        }
        die();
    }
    public function addComment(){
        if(!$this->is_logged()){
            return redirect()->to("market");
        }
        $starCount=0;
        for($i=1;$i<=5;$i++){
            if(isset($_POST["star-cb{$i}"])){
                $starCount++;
            }
        }
        $arr=[
            "customer_id"=>$_SESSION["ID"],
            "product_id"=>$_POST["ID"]
        ];
        $customer_comment=$this->product_comments->where($arr);
        if($customer_comment->countAllResults()>0){
            $arr["comment"]=$_POST["comment"];
            $arr["star"]=$starCount;
            $customer_comment->set($arr)->update();
        }
        else{
            $arr["comment"]=$_POST["comment"];
            $arr["star"]=$starCount;
            $this->product_comments->insert($arr);
        }
        
        return redirect()->back();
    }
    public function deleteComment(){
        if($this->request->isAjax()){
            $product_id=$this->product_model->select("ID")->where("product_name",$_POST["product_name"])->find()[0];
            $this->product_comments->where(["customer_id"=>$_SESSION["ID"],"product_id"=>$product_id["ID"]])->delete();
        }
    }
}
