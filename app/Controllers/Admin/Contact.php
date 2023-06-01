<?php
namespace App\Controllers\Admin;
use CodeIgniter\Controller;

class Contact extends Controller{
    public $contact_info;
    public $db;
    public $view_folder;
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->db=\Config\Database::connect();
        $this->contact_info=new \App\Models\Contact_info();
        $this->view_folder="Admin/Admin/contact_info";
        $this->admin_user=new \App\Models\Admin_user();
        $this->site_general=new \App\Models\Site_general();
        $this->site_settings=["site_settings"=>$this->site_general->select("logo,favicon")->find(1)];
		
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
        $contact=$this->contact_info->find(1);
        $data=[
            ...$this->admin_user_info,
            ...$this->site_settings,
            "pn1"=>$contact["phone_number"],
            "pn2"=>$contact["phone_number2"],
            "email"=>$contact["email"],
            "gmaps"=>$contact["google_maps"],
            "address"=>$contact["address"],
        ];
        return view($this->view_folder."/index",$data);
    }
    public function update(){
        $request=\Config\Services::request();
        if($request->isAJAX()){
            $json=$request->getJSON(true);
            $this->db->transBegin();
            $this->contact_info->update(1,$json);
            $this->db->transComplete();
            if($this->db->transStatus()!=false){
                echo true;
            }
            else{
                echo json_encode(["error_message"=>$this->db->error_get_last]);
            }
        }

    }
}