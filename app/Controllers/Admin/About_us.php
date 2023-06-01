<?php 

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class About_us extends Controller{
    public $about_us_model;
    public $view_folder="Admin/Admin/about_us";
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->about_us_model=new \App\Models\About_us();
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
        $data=[
            "media"=>"",
            "header_1"=>"",
            "header_2"=>"",
            "content"=>"",
            ...$this->admin_user_info,
            ...$this->site_settings,
        ];
        $about_us=$this->about_us_model->find(1);
        $data["media_1"]=$about_us["media_1"];
        $data["header_1"]=$about_us["header_1"];
        $data["header_2"]=$about_us["header_2"];
        $data["content"]=$about_us["content"];

        return view($this->view_folder."/index",$data);
    }
    public function about_us_edit_v(){
        $this->is_logged();
        $data=[
            "media_1"=>"",
            "header_1"=>"",
            "header_2"=>"",
            "content"=>"",
            ...$this->admin_user_info,
            ...$this->site_settings,
        ];
        $about_us=$this->about_us_model->find(1);
        $data["media_1"]=$about_us["media_1"];
        $data["header_1"]=$about_us["header_1"];
        $data["header_2"]=$about_us["header_2"];
        $data["content"]=$about_us["content"];

        return view($this->view_folder."/edit/index",$data);
    }
    public function about_us_edit(){
        $request = \Config\Services::request();
        $about_us=$this->about_us_model->find(1);
        $arr=[
            "header_1"=>$_POST["header_1"],
            "header_2"=>$_POST["header_2"],
            "content"=>$_POST["content"]
        ];
        if($request->getFile("media")->isValid()){
            if(!file_exists(ROOTPATH."public/assets/img/about_us/". $request->getFile("media")->getName())){
                $request->getFile("media")->move(ROOTPATH."public/assets/img/about_us");
                unlink(ROOTPATH."public/{$about_us["media_1"]}");
                $arr["media_1"]="assets/img/about_us/". $request->getFile("media")->getName();
            }
            
        }

        $this->about_us_model->update(1,$arr);
        return redirect()->to("admin/hakkimizda");
    }

}