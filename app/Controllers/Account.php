<?php

namespace App\Controllers;

use Exception;


class Account extends BaseController
{
    public $cart_model;
    public $customer_model;
    public $cart_data;
    public $db;
    public $orders_model;
    public $order_products_model;
    public $address_model;
    public $cities_model;
    private $site_email;
    private $site_address;  
    private $site_phone_number;
    public $contact_info_data;
    public $social_media_data;
    public $site_general_data;
    public $social_media;
    public $site_general;
    public $contact_info;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->cart_model = new \App\Models\cart();
        $this->customer_model = new \App\Models\Customer();
        $this->orders_model = new \App\Models\Orders();
        $this->address_model = new \App\Models\Addresses();
        $this->cities_model=new \App\Models\Cities_model();
        $this->order_products_model=new \App\Models\Order_products();
        $this->site_general=new \App\Models\Site_general();
        $this->social_media=new \App\Models\Social_media();
        $this->contact_info=new \App\Models\Contact_info();
        $this->contact_info_data=["contact_info" =>$this->contact_info->select("phone_number,address,email")->find(1)];
        $this->social_media_data=["social_media"=>$this->social_media->select("facebook,instagram,twitter,tiktok,youtube")->find(1)];
        $this->site_general_data=["site_general"=>$this->site_general->select("logo,favicon,footer_text,copyright,header_text")->find(1)];
        session();
        if ((session()->has("ID")) && (session()->has("logged"))) {
            if($this->customer_model->where("ID",session()->get("ID"))->countAllResults()==0){
                session()->remove("ID");
                session()->remove("logged");
            }else{
                $this->cart_data = $this->cart_model->where("customer_id", $_SESSION["ID"])->countAllResults();
            }
        }else {
            if (!isset($_COOKIE["aid"])) {
                session()->set("aid", uniqid("", true));
                setcookie("aid", session()->get("aid"), time() + (365 * 24 * 60 * 60), "/");
                $this->cart_data = $this->cart_model->where("customer_id", session()->get("aid"))->countAllResults();
                session()->remove("aid");
            } else {
                $this->cart_data = $this->cart_model->where("customer_id", $_COOKIE["aid"])->countAllResults();
            }
        }
    }
    public function is_logged(){
        if(!session()->has("ID") && !session()->has("logged")){
            return false;
        }
        return true;
    }
    public function index()
    {
        if ($this->is_logged()) {
            $customer = $this->customer_model->select("first_name,last_name")->find($_SESSION["ID"]);
            $orders = $this->orders_model->select("orders.ID,order_date,status,order_total,payment_id")
            ->join("order_statuses", "order_statuses.ID=orders.order_status", "inner")
            ->where('customer_id', $_SESSION["ID"])->find();
            $data = [
                "user" => $customer["first_name"] . " " . $customer["last_name"],
                "orders" => [
                    "ID"=>[],
                    "payment_id" => [],
                    "order_date" => [],
                    "order_status" => [],
                    "order_total" => []
                ],
                "cart_count" => $this->cart_data,
                ...$this->contact_info_data,
                ...$this->social_media_data,
                ...$this->site_general_data,
            ];
            foreach ($orders as $item) {
                array_push($data["orders"]["ID"], $item["ID"]);
                array_push($data["orders"]["payment_id"], $item["payment_id"]);
                array_push($data["orders"]["order_date"], $item["order_date"]);
                array_push($data["orders"]["order_status"], $item["status"]);
                array_push($data["orders"]["order_total"], number_format($item["order_total"],2,",","."));
            }
            return view("account/account", $data);
        } else {
            return redirect()->to("giris");
        }
    }
    public function adress()
    {
        if ($this->is_logged()) {
            $data = [
                "cart_count" => $this->cart_data,
                "ID" => [],
                "address_name" => [],
                "city" => [],
                "full_address" => [],
                "picker_firstname" => [],
                "picker_lastname" => [],
                "phone_number" => [],
                ...$this->contact_info_data,
                ...$this->social_media_data,
                ...$this->site_general_data,
            ];
            $query = $this->address_model->select("addresses.ID,customer_id,address_name,cities.city,full_address,phone_number,picker_first_name,picker_last_name")
            ->join("cities","addresses.city=cities.ID","inner")->where("customer_id", $_SESSION["ID"])->findAll();
            foreach ($query as $item) {
                array_push($data["address_name"], $item["address_name"]);
                array_push($data["ID"], $item["ID"]);
                array_push($data["city"], ucfirst($item["city"]));
                array_push($data["full_address"], $item["full_address"]);
                array_push($data["picker_firstname"], $item["picker_first_name"]);
                array_push($data["picker_lastname"], $item["picker_last_name"]);
                array_push($data["phone_number"], $item["phone_number"]);
            }
            return view("account/adress", $data);
        } else {
            return redirect()->to("giris");
        }
    }
    public function add_address()
    {
        if ($this->request->isAjax()) {
            $data = $this->request->getVar();
            $address = [
                "customer_id" => $_SESSION["ID"],
                "picker_first_name" => $data->picker_firstname,
                "picker_last_name" => $data->picker_lastname,
                "address_name" => $data->address_name,
                "full_address" => $data->full_address,
                "phone_number" => $data->phone_number,
                "city"=>$data->city
            ];
            try{
                if($data->address_id==""){
                    $this->address_model->insert($address);
                }else{
                    $this->address_model->update($data->address_id,$address);
                }
                echo true;
            }
            catch(Exception $e){
                echo $e->getCode();
            }
        }
    }
    public function delete_address()
    {
        if ($this->request->isAJAX()) {
            $data = [
                "customer_id" => $_SESSION["ID"],
                "ID" => $_POST["address"]
            ];
            $this->address_model->where($data)->delete();
            if ($this->db->affectedRows() > 0) {
                echo true;
            }
        }
        die();
    }
    public function address_info(){
        if($this->request->isAJAX()){
            $address_info=$this->address_model->find($_POST["ID"]);
            $info=[
                "picker_firstname"=>$address_info["picker_first_name"],
                "picker_lastname"=>$address_info["picker_last_name"],
                "address_name"=>$address_info["address_name"],
                "city"=>$address_info["city"],
                "full_address"=>$address_info["full_address"],
                "phone_number"=>$address_info["phone_number"]
            ];
            echo json_encode($info);
        }
    }
    public function order_detail($ID){
        if(!$this->is_logged()){
            return redirect()->to("giris");
        }
        $order=$this->orders_model->select("orders.*,order_statuses.status")->join("order_statuses","order_statuses.ID=orders.order_status")->find($ID);
        if($order["customer_id"]!=$_SESSION["ID"]) return redirect()->back();
        $data=[
            "cart_count" => $this->cart_data,
            ...$this->contact_info_data,
            ...$this->social_media_data,
            ...$this->site_general_data,
            "order"=>[
                "payment_id"=>"",
                "order_status"=>"",
                "order_date"=>"",
                "order_total"=>"",
                "is_discounted"=>0,
            ],
            "products"=>[]
        ];
        $data["order"]["payment_id"]=$order["payment_id"];
        $data["order"]["order_status"]=$order["order_status"];
        $data["order"]["order_date"]=$order["order_date"];
        $data["order"]["order_total"]=$order["order_total"];
        $data["order"]["status"]=$order["status"];
        $data["order"]["address"]=$order["address"];
        $data["order"]["picker_name"]=$order["picker_name"];
        if($order["is_discounted"]==1){
            $data["order"]["is_discounted"]=1;
            $data["order"]["used_discount_code"]=$order["used_discount_code"];
        }

        $order_detail=$this->order_products_model->select("products.ID,product_name,order_product_price,product_price,quantity")
        ->join("products","products.ID=order_products.product","inner")
        ->where("order_id",$ID)->findAll();
        foreach ($order_detail as $od) {
            # code...
            $data["products"][$od["ID"]]["ID"]=$od["ID"];
            $data["products"][$od["ID"]]["product_name"]=$od["product_name"];
            $data["products"][$od["ID"]]["quantity"]=$od["quantity"];
            $data["products"][$od["ID"]]["order_product_price"]=$od["order_product_price"];
            $data["products"][$od["ID"]]["product_price"]=$od["product_price"];
            $data["products"][$od["ID"]]["product_total"]=$od["order_product_price"]*$od["quantity"];
        }
        // echo "<pre>";
        // print_r($data);
        return view("account/order_details",$data);
    }
}
