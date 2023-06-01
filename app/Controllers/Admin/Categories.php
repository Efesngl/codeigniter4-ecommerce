<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Categories extends Controller
{
    public $db;
    public $product_model;
    public $orders_model;
    public $orders_product_model;
    public $customer_model;
    public $categories_model;
    public $view_folder;
    public $product_images;
    public $cat_array;
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
        $this->product_images = new \App\Models\Product_images();
        $this->categories_model = new  \App\Models\Categories_model();
        $this->admin_user=new \App\Models\Admin_user();
        $this->site_general=new \App\Models\Site_general();
        $this->site_settings=["site_settings"=>$this->site_general->select("logo,favicon")->find(1)];
        $this->cat_array = [];
        $this->view_folder = "Admin/Admin";
        session();
    }
    public function is_logged(){
        
        if(!session()->has("admin_logged") && !session()->has("admin_logged_user")){
            return false;
        }
        
        $this->admin_user_info=["user"=>$this->admin_user->select("username")->where("ID",session()->get("admin_logged_user"))->find()[0]];
        return true;
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
    public function index()
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "categories" => $this->buildTree(0)
        ];
        // echo "<pre>";print_r($data);die();
        return view($this->view_folder . "/categories/index", $data);
    }
    public function category_update_v($ID)
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "ID" => $ID,
            "category_name" => "",
            "parent" => 0,
            "categories" => []
        ];
        $categories = $this->categories_model->where("parent_id", 0)->findAll();
        foreach ($categories as $cat) {
            # code...
            $data["categories"][$cat["ID"]]["ID"] = $cat["ID"];
            $data["categories"][$cat["ID"]]["name"] = $cat["category"];
        }
        $category = $this->categories_model->find($ID);
        $data["category_name"] = $category["category"];
        $data["parent"] = $category["parent_id"];
        return view($this->view_folder . "/categories/edit/index", $data);
    }
    public function category_update($ID)
    {
        $arr = [
            "category" => $_POST["category_name"],
            "parent_id" => $_POST["subcat"]
        ];
        $this->categories_model->where("ID", $ID)->set($arr)->update();
        return redirect()->to("admin/kategoriler");
    }

    public function category_delete()
    {
        $request = \Config\Services::request();
        if ($request->isAjax()) {
            $json = $request->getJSON(true);
            $this->categories_model->delete($json["ID"]);
            if ($this->db->affectedRows() > 0) {
                echo true;
            }
        }
        die();
    }


    public function category_add_v()
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            "categories" => [],
            ...$this->admin_user_info,
            ...$this->site_settings,
        ];
        $categories = $this->categories_model->where("parent_id", 0)->findAll();
        foreach ($categories as $cat) {
            # code...
            $data["categories"][$cat["ID"]]["ID"] = $cat["ID"];
            $data["categories"][$cat["ID"]]["name"] = $cat["category"];
        }
        return view($this->view_folder . "/categories/add/index", $data);
    }

    public function category_add()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $json = $request->getJSON(true);
            if ($this->categories_model->where($json)->countAllResults() == 0) {
                $this->db->transStart();
                $this->categories_model->insert($json);
                $this->db->transComplete();
                if ($this->db->transStatus() != false) {
                    echo true;
                }
            } else {
                echo json_encode(["error_message" => "Bu kategori zaten mevuct"]);
            }
        }
    }

    public function category_search()
    {
        $request = \Config\Services::request();
        if ($request->isAjax()) {
            $json=$request->getJSON(true);
            $data = [
                "categories"=>[]
            ];
            $categories = $this->categories_model->like("category", $json["cat"])->findAll();
            foreach ($categories as $c) {
                $data["categories"][$c["ID"]]["ID"]= $c["ID"];
                $data["categories"][$c["ID"]]["category"]= $c["category"];
                $data["categories"][$c["ID"]]["parent_id"]= $c["parent_id"];
            }
            echo json_encode($data);
        }
        die();
    }
}
