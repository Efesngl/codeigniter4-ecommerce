<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Slider extends Controller
{
    public $slider_model;
    public $db;
    public $view_folder = "Admin/Admin/";
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->slider_model = new \App\Models\Slider_model();
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
    public function index()
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "sliders" => []
        ];
        $slider = $this->slider_model->findAll();
        foreach ($slider as $s) {
            $data["sliders"][$s["ID"]]["ID"] = $s["ID"];
            $data["sliders"][$s["ID"]]["header"] = $s["header"];
            $data["sliders"][$s["ID"]]["text"] = $s["text"];
            $data["sliders"][$s["ID"]]["image"] = $s["image"];
            $data["sliders"][$s["ID"]]["is_active"] = $s["is_active"];
        }
        return view($this->view_folder . "slider/index", $data);
    }
    public function slider_edit_v($ID)
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "ID" => $ID,
            "header" => "",
            "text" => ""
        ];
        $data["header"] = $this->slider_model->find($ID)["header"];
        $data["text"] = $this->slider_model->find($ID)["text"];
        return view($this->view_folder . "slider/edit/index", $data);
    }
    public function slider_edit($ID)
    {
        $request = \Config\Services::request();
        $arr = [
            "header" => $_POST["header"],
            "text" => $_POST["text"],
        ];
        if ($request->getFile("image")->isValid()) {
            if (!file_exists(ROOTPATH . "public/assets/img/slider/" . $request->getFile("image")->getName())) {
                $request->getFile("image")->move(ROOTPATH . "public/assets/img/slider");
            }
            $arr["image"] = "assets/img/slider/" . $request->getFile("image")->getName();
        }
        $this->slider_model->update($ID, $arr);
        return redirect()->to("admin/slider");
    }
    public function add_slider_v()
    {
        if(!$this->is_logged()){
            return redirect()->to("admin");
        }
        $data=[
            ...$this->admin_user_info,
            ...$this->site_settings,
        ];
        return view($this->view_folder . "slider/add/index",$data);
    }
    public function add_slider()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $image = $request->getFile("image");
            $arr = [
                "header" => $_POST["header"],
                "text" => $_POST["text"],
                "image" => "assets/img/slider/" . $image->getName(),
                "is_active" => 1
            ];
            if ($image->isValid()) {
                if (!file_exists(ROOTPATH . "public/assets/img/slider/{$image->getName()}")) {
                    $image->move(ROOTPATH . "public/assets/img/slider/");
                } else {
                    echo json_encode(["error_message" => "Resim zaten mevcut !"]);
                    die();
                }
                $this->db->transStart();
                $this->slider_model->insert($arr);
                $this->db->transComplete();
                if ($this->db->transStatus() != false) {
                    echo true;
                } else {
                    echo json_encode(["error_message" => $this->db->error()]);
                }
            }
            else{
                echo json_encode(["error_message" => "Lütfen resim seçiniz !"]);
            }
        }
    }
    public function slider_delete()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $json = $request->getJSON(true);
            $image=$this->slider_model->find($json["ID"])["image"];
            $this->db->transStart();
            $this->slider_model->delete($json["ID"]);
            $this->db->transComplete();
            if ($this->db->transStatus() != false) {
                unlink(ROOTPATH . "public/{$image}");
                echo true;
            }
        }
    }

    public function is_active()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $json = $request->getJSON(true);
            $this->slider_model->update($json["ID"], ["is_active" => ($json["is_active"] == 1) ? 1 : 0]);
        }
    }
}
