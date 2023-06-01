<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Discounts extends Controller{
    public $view_folder="Admin/Admin/discounts/";
    public $discounts_model;
    public $db;
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->discounts_model=new \App\Models\Discounts();
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
            "codes"=>[]
        ];
        $codes=$this->discounts_model->findAll();
        foreach ($codes as $c) {
            # code...
            $data["codes"][$c["ID"]]["ID"]=$c["ID"];
            $data["codes"][$c["ID"]]["code"]=$c["code"];
            $data["codes"][$c["ID"]]["discount"]=$c["discount"];
            $data["codes"][$c["ID"]]["min_total"]=$c["min_total"];
            $data["codes"][$c["ID"]]["discount_type"]="Birim";
            if($c["discount_type"]==1){
                $data["codes"][$c["ID"]]["discount_type"]="Yüzdelik";
            }
            $data["codes"][$c["ID"]]["is_active"]=$c["is_active"];
        }
        return view($this->view_folder."index",$data);
    }

    public function discount_add_v(){
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data=[
            ...$this->admin_user_info,
            ...$this->site_settings,
        ];
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        return view($this->view_folder."add/index",$data);
    }
    public function discount_add(){
        $request=\Config\Services::request();
        if($request->isAJAX()){
            $json=$request->getJSON(true);
            if($this->discounts_model->where($json)->countAllResults()==0) {
                $this->db->transStart();
                $this->discounts_model->insert($json);
                $this->db->transComplete();
                if($this->db->transStatus()!=false){
                    echo true;
                }
            }
            else{
                echo json_encode(["error_message"=>"Bu indirim kodu zaten mevcut !"]);
            }
        }
    }
    public function discount_delete(){
        $request = \Config\Services::request();
        if($request->isAJAX()){
            $json=$request->getJSON(true);
            $this->discounts_model->delete($json["ID"]);
            if($this->db->affectedRows()>0){
                echo "1";
            }
        }
        die();
    }

    public function discount_search(){
        $request = \Config\Services::request();
        if($request->isAjax()){
            $data=[
                "codes"=>[]
                // "ID"=>[],
                // "code"=>[],
                // "discount"=>[],
                // "min_total"=>[],
                // "discount_type"=>[]
            ];
            $json=$request->getJSON(true);
            $discounts=$this->discounts_model->like("code",$json["code"])->findAll();
            foreach($discounts as $d){
                $data["codes"][$d["ID"]]["ID"]=$d["ID"];
                $data["codes"][$d["ID"]]["code"]=$d["code"];
                $data["codes"][$d["ID"]]["discount"]=$d["discount"];
                $data["codes"][$d["ID"]]["min_total"]=$d["min_total"];
                $data["codes"][$d["ID"]]["discount_type"]="Birim";
                $data["codes"][$d["ID"]]["is_active"]=$d["is_active"];

                if($d["discount_type"]=="1"){
                    $data["codes"][$d["ID"]]["discount_type"]="Yüzdelik"; 
                }
            }
            echo json_encode($data);
        }
        die();
    }
    public function is_active(){
        $request = \Config\Services::request();
        if($request->isAjax()){
            $json=$request->getJSON(true);
            $this->db->transStart();
            $this->discounts_model->update($json["ID"],["is_active"=>($json["checked"]==1)?1:0]);
            $this->db->transComplete();
            if($this->db->transStatus()!=false){
                echo true;
            }
        }
        die();
    }

    public function discount_edit_v($ID){
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data=[            
            ...$this->admin_user_info,
        ...$this->site_settings,
            "code"=>"",
            "discount"=>0,
            "min_total"=>0,
            "discount_type"=>0
        ];
        $discount=$this->discounts_model->find($ID);
        $data["code"]=$discount["code"];
        $data["discount"]=$discount["discount"];
        $data["min_total"]=$discount["min_total"];
        $data["discount_type"]=$discount["discount_type"];
        return view($this->view_folder."edit/index",$data);
    }
}