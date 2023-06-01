<?php
namespace App\Controllers\Admin;
use CodeIgniter\Controller;

class Social extends Controller{
    public $social;
    public $db;
    public $view_folder;
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->db=\Config\Database::connect();
        $this->social=new \App\Models\Social_media();
        $this->view_folder="Admin/Admin/social_media";
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
        $sm=$this->social->find(1);
        $data=[
            ...$this->admin_user_info,
            ...$this->site_settings,
            "face"=>$sm["facebook"],
            "insta"=>$sm["instagram"],
            "yt"=>$sm["youtube"],
            "tiktok"=>$sm["tiktok"],
            "twitter"=>$sm["twitter"],
        ];
        return view($this->view_folder."/index",$data);
    }
    public function update(){
        $request=\Config\Services::request();
        if($request->isAJAX()){
            $json=$request->getJSON(true);
            $this->db->transBegin();
            $this->social->update(1,$json);
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