<?php
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use Config\Database;
use DivisionByZeroError;
use PhpParser\Node\Expr\Cast\Array_;
use PHPUnit\TextUI\XmlConfiguration\IntroduceCoverageElement;

class Admin extends Controller{
    public $db;
    public $product_model;
    public $orders_model;
    public $orders_product_model;
    public $customer_model;
    public $view_folder;
    public $product_images;
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->db= \Config\Database::connect();
        $this->customer_model = new \App\Models\Customer();
        $this->orders_model = new \App\Models\Orders();
        $this->product_model = new \App\Models\Products();
        $this->orders_model=new \App\Models\Orders();
        $this->orders_product_model=new \App\Models\Order_products();
        $this->product_images=new \App\Models\Product_images();
        $this->admin_user=new \App\Models\Admin_user();
        $this->site_general=new \App\Models\Site_general();
        $this->site_settings=["site_settings"=>$this->site_general->select("logo,favicon")->find(1)];
        $this->view_folder="Admin/Admin";
        // $this->session=\Config\Services::session();
        if(isset($_COOKIE["admin_remembered"])){
            session()->set("admin_logged",1);
            session()->set("admin_logged_user",$_COOKIE["admin_remembered_user"]);

        }
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
        if(isset($_POST["get_table"])){
            if($_POST["get_table"]==1){
                $data=[
                    1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0
                ];
                $montly_sale=$this->orders_model->select("count(*) as 'count',month(order_date) as 'ay'")->groupBy("month(order_date)")->findAll()[0];
                $data[$montly_sale["ay"]]=$montly_sale["count"];
            }
            else{
                $data=[
                    2012=>0,2013=>0,2014=>0,2015=>0,2016=>0,2017=>0,2018=>0,2019=>0,2020=>0,2021=>0,2022=>0,2023=>0
                ];
                $yearly_sale=$this->orders_model->select("count(*) as 'count',year(order_date) as 'yıl'")->groupBy("month(order_date)")->findAll()[0];
                $data[$yearly_sale["yıl"]]=$yearly_sale["count"];
            }
            echo json_encode($data);
            die();
        }
        $order_status_model=new \App\Models\Order_statuses();
        $data=[
            ...$this->admin_user_info,
            ...$this->site_settings,
            "total_order"=>$this->orders_model->countAllResults(),
            "total_earning"=>$this->orders_model->select("sum(order_total) as 'total'")->find()[0]["total"],
            "ortalama_fiyat"=>$this->orders_model->select("avg(order_total) as 'avg'")->find()[0]["avg"],
            "motnhs"=>[1,2,3,4,5,6,7,8,9,10,11,12],
            "montly_sale"=>[0,0,0,0,0,0,0,0,0,0,0,0],
            "montly_earning"=>$this->orders_model->select("sum(order_total) as 'total'")->where("month(order_date)",date("n"))->find()[0]["total"] ?? 0,
            "last_month_earning"=>$this->orders_model->select("sum(order_total) as 'total'")->where("month(order_date)",date("n")-1)->find()[0]["total"] ?? 0,
            "diff_from_last_month"=>0,
            "last_orders"=>$this->orders_model
            ->select("customer.full_name,orders.ID as 'order_id',orders.payment_id,order_statuses.status as 'order_status_txt',order_statuses.ID as 'order_status_id',order_total,order_date")
            ->join("customer","customer.ID=orders.customer_id")
            ->join("order_statuses","order_statuses.ID=orders.order_status")
            ->orderBy("orders.order_date","desc")
            ->findAll("5"),
            "order_statuses"=>$order_status_model->findAll()
        ];
        $montly_sale=$this->orders_model->select("count(*) as 'count',month(order_date) as 'ay'")->groupBy("month(order_date)")->findAll()[0];
        $data["montly_sale"][$montly_sale["ay"]-1]=$montly_sale["count"];
        if($data["last_month_earning"]!=0){
            try{
                $data["diff_from_last_month"]=($data["montly_earning"]-$data["last_month_earning"])*100/$data["last_month_earning"];
            }
            catch(DivisionByZeroError $e){
                $data["diff_from_last_month"]=0;
            }
        }
        else{
            $data["diff_from_last_month"]=0;
        }
        return view($this->view_folder."/index",$data);
    }
    public function login(){
        if($_SERVER["REQUEST_METHOD"]=="GET"){
            if(!$this->is_logged()) return redirect()->to("admin");
        }
        else{
            $email=$_POST["email"];
            $password=$_POST["password"];
            $user=$this->admin_user->like("email",$email)->find();
            print_r($user);
            if(count($user)!=0){
                if($email==$user[0]["email"] && md5($password)==$user[0]["password"]){
                    if(isset($_POST["remember-check"])){
                        setcookie("admin_remembered",true,time()+(86400*365),"/admin"); 
                        setcookie("admin_remembered_user",$user[0]["ID"],time()+(86400*365),"/admin"); 
                    }
                    session()->set("admin_logged",true);
                    session()->set("admin_logged_user",$user[0]["ID"]);
                    return redirect()->to("admin/anasayfa");
                }
            }
            return redirect()->to("admin");
        }

    }
    public function giris_yap(){
        if(isset($_COOKIE["admin_remembered"])){
            return redirect()->to("admin/anasayfa");
        }
        $data=[
            ...$this->site_settings
        ];
        return view("Admin/index",$data);
    }
    public function logout(){
        session()->remove("admin_logged");
        session()->remove("admin_logged_user");
        if(isset($_COOKIE["admin_remembered"])){
            setcookie("admin_remembered",0,time()-3600,"/admin");
        }
        return redirect()->to("admin");
    }
}