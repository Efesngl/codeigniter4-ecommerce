<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Brands extends Controller
{
    public $db;
    public $view_folder;
    public $brand_model;
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->view_folder = "Admin/Admin";
        $this->brand_model = new \App\Models\Brands_model;
        $this->admin_user=new \App\Models\Admin_user();
        $this->site_general=new \App\Models\Site_general();
        $this->site_settings=["site_settings"=>$this->site_general->select("logo,favicon")->find(1)];
        session();
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
            "brands" => [],
            ...$this->admin_user_info,
            ...$this->site_settings,
        ];
        $brands = $this->brand_model->findAll();
        foreach ($brands as $b) {
            # code...
            $data["brands"][$b["ID"]]["ID"] = $b["ID"];
            $data["brands"][$b["ID"]]["brand"] = $b["brand"];
        }
        return view($this->view_folder . "/brands/index", $data);
    }
    public function brand_edit_v($ID)
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            "ID" => $ID,
            "brand" => "",
            ...$this->admin_user_info,
            ...$this->site_settings,
        ];
        $brand = $this->brand_model->find($ID);
        $data["brand"] = $brand["brand"];
        return view($this->view_folder . "/brands/edit/index", $data);
    }
    public function brand_edit($ID)
    {
        $arr = [
            "brand" => $_POST["brand"]
        ];
        $this->brand_model->set($arr)->update($ID);
        return redirect()->to("admin/markalar");
    }
    public function brand_delete()
    {
        $request = \Config\Services::request();
        if ($request->isAjax()) {
            $json = $request->getJSON(true);
            $this->brand_model->delete($json["ID"]);
            if ($this->db->affectedRows() > 0) {
                echo "1";
            }
        }
        die();
    }

    public function brand_add_v()
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        return view($this->view_folder . "/brands/add/index");
    }
    public function brand_add()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $json = $request->getJSON(true);
            if ($this->brand_model->where($json)->countAllResults() == 0) {
                $this->db->transStart();
                $this->brand_model->insert($json);
                $this->db->transComplete();
                if ($this->db->transStatus() != false) {
                    echo true;
                }
            } else {
                echo json_encode(["error_message" => "Bu marka zaten mevuct"]);
            }
        }
        die();
    }
    public function brand_search()
    {
        $request = \Config\Services::request();
        if ($request->isAjax()) {
            $json=$request->getJSON(true);
            $data = [
                "brands"=>[]
            ];
            $brands = $this->brand_model->like("brand", $json["brand"])->findAll();
            foreach ($brands as $b) {
                $data["brands"][$b["ID"]]["ID"]= $b["ID"];
                $data["brands"][$b["ID"]]["brand"]= $b["brand"];
            }
            echo json_encode($data);
        }
        die();
    }
}
