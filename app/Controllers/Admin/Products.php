<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Controller;
use Exception;

class Products extends Controller
{
    public $db;
    public $product_model;
    public $orders_model;
    public $orders_product_model;
    public $customer_model;
    public $view_folder;
    public $product_images_model;
    public $category_model;
    public $brands_model;
    public $product_desc_model;
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->customer_model = new \App\Models\Customer();
        $this->orders_model = new \App\Models\Orders();
        $this->product_model = new \App\Models\Products();
        $this->orders_model = new \App\Models\Orders();
        $this->orders_product_model = new \App\Models\Order_products();
        $this->product_images_model = new \App\Models\Product_images();
        $this->category_model = new \App\Models\Categories_model();
        $this->brands_model = new \App\Models\Brands_model();
        $this->product_desc_model = new \App\Models\Product_desc();
        $this->admin_user=new \App\Models\Admin_user();
        $this->site_general=new \App\Models\Site_general();
        $this->site_settings=["site_settings"=>$this->site_general->select("logo,favicon")->find(1)];
        $this->view_folder = "Admin/Admin/products";
    }
    public function is_logged(){
        
        if(!session()->has("admin_logged") && !session()->has("admin_logged_user")){
            return false;
        }
        
        $this->admin_user_info=["user"=>$this->admin_user->select("username")->where("ID",session()->get("admin_logged_user"))->find()[0]];
        return true;
    }
    public function index()
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "products" => []
        ];
        $products = $this->product_model
            ->select("product_images.image,products.ID,products.product_name")
            ->join("product_images", "product_images.product=products.ID", "right")
            ->where("product_images.is_main", 1)
            ->findAll();
        // echo $this->db->getLastQuery();
        // echo "<br><pre>";print_r($products);die();
        foreach ($products as $p) {
            # code...
            $data["products"][$p["ID"]]["ID"] = $p["ID"];
            $data["products"][$p["ID"]]["product_name"] = $p["product_name"];
            $data["products"][$p["ID"]]["product_image"] = $p["image"];
        }
        return view($this->view_folder . "/index", $data);
    }

    public function product_edit_v($id)
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "ID" => $id,
            "product_name" => "",
            "product_price" => 0,
            "product_brand" => "",
            "product_category" => "",
            "product_status" => 2,
            "is_discounted" => 0,
            "is_new" => 0,
            "discounted_price" => 0,
            "product_desc" => $this->product_desc_model->where("product_id", $id)->find()[0]["desc"] ?? "",
            "categories" => [],
            "brands" => []
        ];
        $categories = $this->category_model->findAll();
        foreach ($categories as $c) {
            # code...
            $data["categories"][$c["ID"]]["name"]=$c["category"];
            $data["categories"][$c["ID"]]["ID"]=$c["ID"];
        }
        $brands = $this->brands_model->findAll();
        foreach ($brands as $b) {
            # code...
            $data["brands"][$b["ID"]]["name"]= $b["brand"];
            $data["brands"][$b["ID"]]["ID"]= $b["ID"];
        }
        $product = $this->product_model->where("ID", $id)->findAll();
        foreach ($product as $pr) {
            # code...
            $data["product_name"] = $pr["product_name"];
            $data["product_price"] = $pr["product_price"];
            if (!is_null($pr["product_brand"])) {
                $pp = $this->brands_model->where("ID", $pr["product_brand"])->find()[0]["brand"];
                $data["product_brand"] = $pp;
            } else {
                $data["product_brand"] = "null";
            }
            if (!is_null($pr["product_category"])) {
                $c = $this->category_model->where("ID", $pr["product_category"])->find()[0]["category"];
                $data["product_category"] = $c;
            } else {
                $data["product_category"] = "null";
            }
            $data["product_status"] = $pr["product_status"];
            $data["is_discounted"] = $pr["is_discounted"];
            if ($pr["is_discounted"] == "1") {
                $data["discounted_price"] = $pr["discounted_price"];
            }
            $data["is_new"] = $pr["is_new"];
        }
        return view($this->view_folder . "/edit/index", $data);
    }

    public function add_product_v()
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "categories" => [],
            "brands" => []
        ];
        $categories = $this->category_model->findAll();
        foreach ($categories as $c) {
            # code...
            $data["categories"][$c["ID"]]["name"]=$c["category"];
            $data["categories"][$c["ID"]]["ID"]=$c["ID"];
        }
        $brands = $this->brands_model->findAll();
        foreach ($brands as $b) {
            # code...
            $data["brands"][$b["ID"]]["name"]= $b["brand"];
            $data["brands"][$b["ID"]]["ID"]= $b["ID"];
        }
        return view($this->view_folder . "/add/index", $data);
    }

    public function product_images_v($ID)
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "ID" => $ID,
            "images"=>[]
        ];
        $images = $this->product_images_model->where("product", $ID)->findAll();
        foreach ($images as $im) {
            # code...
            $data["images"][$im["ID"]]["image"]= $im["image"];
            $data["images"][$im["ID"]]["image_id"]= $im["ID"];
            $data["images"][$im["ID"]]["is_main"]= $im["is_main"];
        }
        return view($this->view_folder . "/image_edit_v/index", $data);
    }


    public function product_edit()
    {
        $data = [
            "product_name" => $_POST["product_name"],
            "product_price" => $_POST["product_price"],
            "product_category" => $_POST["product_category"],
            "product_brand" => $_POST["product_brand"],
            "product_status" => 2,
            "is_discounted" => 0,
            "discounted_price" => 0,
            "is_new" => 0
        ];
        if (isset($_POST["is_discounted"])) {
            $data["is_discounted"] = 1;
        }
        if (isset($_POST["discounted_price"]) && isset($_POST["is_discounted"])) {
            $data["discounted_price"] = $_POST["discounted_price"];
        }
        if (isset($_POST["stock"])) {
            $data["product_status"] = 1;
        }
        if (isset($_POST["is_new"])) {
            $data["is_new"] = 1;
        }
        $product_desc_arr = [
            "desc" => $_POST["product-desc"]
        ];
        $this->product_model->where("ID", $_POST["ID"])->set($data)->update();
        $product_desc = $this->product_desc_model;
        if ($product_desc->where("product_id", $_POST["ID"])->countAllResults() > 0) {
            $product_desc->where("product_id", $_POST["ID"])->set($product_desc_arr)->update();
        } else {
            $product_desc_arr["product_id"] = $_POST["ID"];
            $product_desc->insert($product_desc_arr);
        }
        return redirect()->to("admin/urunler/duzenle/{$_POST["ID"]}");
    }
    public function product_desc_image()
    {
        $accepted_origins = array("http://localhost", "http://efesengul.com");

        /*********************************************
         * Change this line to set the upload folder *
         *********************************************/
        $imageFolder =  "/assets/img/product/product_desc/";

        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // same-origin requests won't set an origin. If the origin is set, it must be valid.
            if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
                header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            } else {
                header("HTTP/1.1 403 Origin Denied");
                return;
            }
        }

        // Don't attempt to process the upload on an OPTIONS request
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            header("Access-Control-Allow-Methods: POST, OPTIONS");
            return;
        }

        reset($_FILES);
        $temp = current($_FILES);
        if (is_uploaded_file($temp['tmp_name'])) {
            /*
            If your script needs to receive cookies, set images_upload_credentials : true in
            the configuration and enable the following two headers.
          */
            // header('Access-Control-Allow-Credentials: true');
            // header('P3P: CP="There is no P3P policy."');

            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }

            // Verify extension
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }

            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . time() . "." . pathinfo($temp["name"])["extension"];

            move_uploaded_file($temp['tmp_name'], ROOTPATH . "public" . $filetowrite);


            // Respond to the successful upload with JSON.
            // Use a location key to specify the path to the saved image resource.
            // { location : '/your/uploaded/image/file'}
            echo json_encode(['location' => base_url() . $filetowrite]);
        } else {
            // Notify editor that the upload failed
            header("HTTP/1.1 500 Server Error");
        }
        die();
    }
    public function product_delete()
    {
        $request = \Config\Services::request();
        if ($request->isAjax()) {
            $product_id = $request->getJSON(true);
            $this->product_model->delete($product_id["ID"]);
            if ($this->db->affectedRows() > 0) {
                echo true;
            }
        }
        die();
    }


    public function add_product()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $json=$request->getJSON(true);
            if($this->product_model->where($json)->countAllResults()==0){
                $json["total_selled"]=0;
                if ($json["is_discounted"]!="") {
                    $json["discounted_price"] = $json["discounted_price"];
                }
                else{
                    $json["is_discounted"]=0;
                }
                if($json["product_status"]==""){
                    $json["product_status"]=2;
                }
                if($json["is_new"]==""){
                    $json["is_new"]=0;
                }
                $this->product_model->insert($json);
                $product_id = $this->product_model->where("product_name", $json["product_name"])->find()[0]["ID"];
                $this->db->query("call product_image({$product_id})");
                if($this->db->affectedRows()>0){
                    echo true;
                }
            }
            else{
                echo json_encode(["error_message"=>"Bu ürün zaten mevcut"]);
            }
        }
    }

    public function product_images($id)
    {
        $request = \Config\Services::request();
        $files = $request->getFile("file");
        $product = $this->product_model->find($id);
        $product_name = $product["product_name"];
        $image_path = ROOTPATH . "public/assets/img/product/" . $product_name;
        if (!file_exists($image_path . "/" . $files->getName())) {
            $files->move($image_path);
            $db_img_path = "assets/img/product/" . $product_name . "/" . $files->getName();
            $arr = [
                "product" => $id,
                "image" => $db_img_path,
                "is_main" => 0
            ];
            $this->product_images_model->insert($arr);
        } else {
            unlink($image_path . "/" . $files->getName());
            $files->move($image_path);
        }
    }
    public function image_switch(){
        $request=\Config\Services::request();
        if($request->isAJAX()){
            $json=$request->getJSON(true);
            $this->product_images_model->update($json["ID"],["is_main"=>$json["checked"]]);
        }
        die();
    }
    public function product_image_delete()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $ID = $request->getJSON(true)["ID"];
            $pi = $this->product_images_model->find($ID);
            unlink($pi["image"]);
            $this->product_images_model->delete($ID);
            if ($this->db->affectedRows() > 0) {
                echo true;
            }
        }

        die();
    }

    public function product_search()
    {
        $request = \Config\Services::request();
        if ($request->isAjax()) {
            $data = [
                "products" => []
            ];
            $search = $_POST["ps"];
            $products = $this->product_model
                ->select("product_images.image,products.ID,products.product_name")
                ->join("product_images", "product_images.product=products.ID")
                ->like("products.product_name", $search)
                ->where("product_images.is_main", 1)
                ->findAll();
            foreach ($products as $p) {
                $data["products"][$p["ID"]]["ID"] = $p["ID"];
                $data["products"][$p["ID"]]["product_name"] = $p["product_name"];
                $data["products"][$p["ID"]]["product_image"] = $p["image"];
            }
            echo json_encode($data);
        }
        die();
    }
    public function product_comments($id)
    {
        $data = [
            "product_name" => $this->product_model->where("ID", $id)->find()[0]["product_name"],
            "comments" => []
        ];
        $product_comments_model = new \App\Models\Product_comments();
        $product_comments = $product_comments_model
            ->select("product_comments.ID,comment,star,customer.full_name")
            ->join("customer", "customer.ID=product_comments.customer_id")
            ->where("product_id", $id)
            ->findAll();
        foreach ($product_comments as $pc) {
            # code...
            $data["comments"][$pc["ID"]]["ID"] = $pc["ID"];
            $data["comments"][$pc["ID"]]["customer_name"] = $pc["full_name"];
            $data["comments"][$pc["ID"]]["comment"] = $pc["comment"];
            $data["comments"][$pc["ID"]]["star"] = $pc["star"];
        }
        return view($this->view_folder . "/product_comments/index", $data);
    }
    public function delete_product_comment(){
        $request = \Config\Services::request();
        if($request->isAJAX()){
            $product_comments_model = new \App\Models\Product_comments();
            $json=$request->getJSON(true);
            $product_comments_model->delete($json["ID"]);
            if($this->db->affectedRows()>0){
                echo true;
            }
        }
        die();
    }
}
