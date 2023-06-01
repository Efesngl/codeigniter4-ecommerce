<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Customers extends Controller{
    public $customer_model;
    public $address_model;
    public $view_folder="Admin/Admin/";
    public $db;
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->address_model= new \App\Models\Addresses();
        $this->customer_model= new  \App\Models\Customer();
        $this->db= \Config\Database::connect();
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
    public function index(){
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data=[
            ...$this->admin_user_info,
            ...$this->site_settings,
            "customers"=>[]
        ];
        $customers=$this->customer_model->select("ID,full_name,email")->findAll();
        foreach($customers as $c){
            $data["customers"][$c["ID"]]["customer_name"]=$c["full_name"];
            $data["customers"][$c["ID"]]["ID"]=$c["ID"];
            $data["customers"][$c["ID"]]["email"]=$c["email"];
        }
        return view($this->view_folder."customers/index",$data);
    }

    public function customer_edit_v($ID){
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $customer=$this->customer_model->find($ID);
        $addresses=$this->address_model->where("customer_id",$ID)->findAll();
        $data=[
            "ID"=>$ID,
            "firstname"=>$customer["first_name"],
            "lastname"=>$customer["last_name"],
            "password"=>$customer["password"],
            "email"=>$customer["email"],
            "addresses"=>[]
        ];
        foreach($addresses as $a){
            $data["addresses"][$a["ID"]]["ID"]=$a["ID"];
            $data["addresses"][$a["ID"]]["address_name"]=$a["address_name"];
            $data["addresses"][$a["ID"]]["city"]=$a["city"];
            $data["addresses"][$a["ID"]]["full_address"]=$a["full_address"];
            $data["addresses"][$a["ID"]]["phone_number"]=$a["phone_number"];
            $data["addresses"][$a["ID"]]["picker_first_name"]=$a["picker_first_name"];
            $data["addresses"][$a["ID"]]["picker_last_name"]=$a["picker_last_name"];
        }
        return view($this->view_folder."customers/edit/index",$data);
    }

    public function customer_edit(){
        $request = \Config\Services::request();
        if($request->isAJAX()){
            $json=$request->getJSON(true);
            $this->db->transStart();
            $this->customer_model->update($json["ID"],$json["customer"]);
            $this->db->transComplete();
            if($this->db->transStatus()!= false){
                echo true;
            }
        }
    }
    public function customer_edit_address(){
        $request = \Config\Services::request();
        if($request->isAJAX()){
            $json=$request->getJSON(true);
            $this->db->transStart();
            $this->address_model->update($json["ID"],$json["address"]);
            $this->db->transComplete();
            if($this->db->transStatus()!= false){
                echo true;
            }
        }   
    }

    public function customer_delete(){
        $request = \Config\Services::request();
        if($request->isAjax()){
            $json=$request->getJSON(true);
            $this->customer_model->delete($json["ID"]);
            echo ($this->db->affectedRows()>0)?"1":"0";
        }
        // return redirect()->to("admin/musteriler");
    }
    public function customer_search(){
        $request = \Config\Services::request();
        if($request->isAjax()){
            $json=$request->getJSON(true);
            $data=[
                "customers"=>[]
            ];
            $customers=$this->customer_model->select("ID,full_name,email")->like("full_name",$json["customer_search"])->findAll();
            foreach($customers as $c){
                $data["customers"][$c["ID"]]["ID"]=$c["ID"];
                $data["customers"][$c["ID"]]["full_name"]=$c["full_name"];
                $data["customers"][$c["ID"]]["email"]=$c["email"];
            }
            echo json_encode($data);
        }
        die();
    }
}