<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use Exception;

class SiteSettings extends Controller
{
    public $site_general;
    public $db;
    public $view_folder;
    public $admin_user;
    private $admin_user_info;
    private $site_settings;
    public function __construct()
    {
        $this->site_general = new \App\Models\Site_general();
        $this->db = \Config\Database::connect();
        $this->admin_user=new \App\Models\Admin_user();
        $this->site_general=new \App\Models\Site_general();
        $this->site_settings=["site_settings"=>$this->site_general->select("logo,favicon")->find(1)];
        $this->view_folder = "Admin/Admin/site_general/";
    }
    public function index()
    {
        $data = [
            "site_general" => $this->site_general->select("logo,favicon,footer_text,copyright,header_text")->find(1),
            ...$this->admin_user_info,
            ...$this->site_settings,
        ];
        $this->admin_user_info=["user"=>$this->admin_user->select("username")->where("ID",session()->get("admin_logged_user"))->find()[0]];
        return view($this->view_folder . "index", $data);
    }
    public function update_site_general()
    {
        $req = \Config\Services::request();
        $images = $req->getFiles();
        $data = [
            ...$req->getPost()
        ];
        $imager = \Config\Services::image();
        foreach ($images as $key => $img) {
            # code...
            if ($img->isValid() && !$img->hasMoved()) {
                $path = "assets/img/logo/";
                $fileW = ($key == "logo") ? 100 : 32;
                $fileH = ($key == "logo") ? 100 : 32;
                if($key=="logo"){
                    if(file_exists(ROOTPATH . "public/" . $path . $img->getName())) {
                        unlink(ROOTPATH . "public/" . $path . $img->getName());
                    }
                    else{
                        unlink(ROOTPATH."public/".$this->site_general->select("logo")->find(1)["logo"]);
                    }
                    try {
                        $imager->withFile($img->getPathName())->fit($fileW, $fileH, "center")->save(ROOTPATH . "public/" . $path . $img->getName());
                    } catch (Exception $e) {
                        echo json_encode(["error_message" => $e->getMessage()]);
                        die();
                    }
                    $data[$key] = $path . $img->getName();
                }
                else{
                    if(file_exists(ROOTPATH . "public/" . $path . $img->getName())) {
                        unlink(ROOTPATH . "public/" . $path . $img->getName());
                    }
                    else{
                        unlink(ROOTPATH."public/".$this->site_general->select("favicon")->find(1)["favicon"]);
                    }
                    $image_size=getimagesize($img);
                    if($image_size[0]==32 && $image_size[1]==32){
                        $img->move(ROOTPATH . "public/" . $path);
                        $data[$key] = $path . $img->getName();
                    }
                    else{
                        echo json_encode(["error_message" => "Lütfen favicon için 32x32 resim yükleyiniz"]);
                        die();
                    }
                }
            }
        }
        $this->db->transStart();
        $this->site_general->update(1,$data);
        $this->db->transComplete();
        if($this->db->transStatus()!=false){
            echo true;
        }
        else{
            echo json_encode(["error_message"=>"Veritabanıyla ilgili bir problem oluştu !"]);
            die();
        }
        die();
    }
}
