<?php

namespace app\Controllers\Admin;

use CodeIgniter\Controller;

class Orders extends Controller
{
    public $orders_model;
    public $db;
    public $customer_model;
    public $product_model;
    public $order_products_model;
    public $product_images;
    public $order_statuses_model;
    public $admin_user;
    private $admin_user_info;
    private $site_general;
    private $site_settings;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->customer_model = new \App\Models\Customer();
        $this->orders_model = new \App\Models\Orders();
        $this->order_products_model = new \App\Models\Order_products();
        $this->product_model = new \App\Models\Products();
        $this->product_images = new \App\Models\Product_images();
        $this->order_statuses_model = new \App\Models\Order_statuses();
        $this->admin_user = new \App\Models\Admin_user();
        $this->site_general = new \App\Models\Site_general();
        $this->site_settings = ["site_settings" => $this->site_general->select("logo,favicon")->find(1)];
        session();
    }
    
    public function is_logged()
    {
        
        if (!session()->has("admin_logged") && !session()->has("admin_logged_user")) {
            return false;
        }
        
        $this->admin_user_info = ["user" => $this->admin_user->select("username")->where("ID", session()->get("admin_logged_user"))->find()[0]];
        return true;
    }
    public function index()
    {
        if (!$this->is_logged()) {
            return redirect()->to("admin");
        }
        if (!isset($_GET["limit"])) {
            $_GET["limit"] = 25;
        }
        $limit = $_GET["limit"];
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }
        $pagination_number = $this->orders_model->countAll() / $limit;
        $data = [
            ...$this->admin_user_info,
            ...$this->site_settings,
            "orders" => [],
            "order_statuses" => [],
            "page_number" => $pagination_number
        ];
        $start = ($_GET["page"] - 1) * $limit;
        $orders = $this->orders_model
            ->select("customer.full_name as 'customer_name',orders.ID as 'order_id',payment_id,customer.ID as 'customer_id',order_date,order_statuses.status,orders.order_status as 'order_status_id',order_total,")
            ->join("customer", "customer.ID=orders.customer_id", "inner")
            ->join("order_statuses", "order_statuses.ID=orders.order_status", "inner")
            ->findAll($limit, $start);
        foreach ($orders as $order) {
            # code...
            $data["orders"][$order["order_id"]]["order_id"] = $order["order_id"];
            $data["orders"][$order["order_id"]]["payment_id"] = $order["payment_id"];
            $data["orders"][$order["order_id"]]["customer_name"] = $order["customer_name"];
            $data["orders"][$order["order_id"]]["customer_id"] = $order["customer_id"];
            $data["orders"][$order["order_id"]]["order_date"] = $order["order_date"];
            $data["orders"][$order["order_id"]]["order_status"] = $order["order_status_id"];
            $data["orders"][$order["order_id"]]["order_status_txt"] = $order["status"];
            $data["orders"][$order["order_id"]]["order_total"] = number_format($order["order_total"], 2, ",", ".");
        }
        $order_statuses = $this->order_statuses_model->findAll();
        foreach ($order_statuses as $os) {
            # code...
            $data["order_statuses"][$os["ID"]]["ID"] = $os["ID"];
            $data["order_statuses"][$os["ID"]]["status"] = $os["status"];
        }
        return view("Admin/Admin/orders/index", $data);
    }
    public function details()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $json = $request->getJSON(true);
            $data = [
                "order_id" => $json["order_id"],
                "payment_id" => "",
                "customer_name" => "",
                "products" => [],
                "total" => 0,
                "is_discounted" => 0,
                "order_address"=>""
            ];
            $order = $this->orders_model
                ->select("customer.full_name as 'customer_name',payment_id,order_date,order_total,is_discounted,used_discount_code,address,picker_name")
                ->join("customer", "customer.ID=orders.customer_id", "inner")
                ->find($json["order_id"]);
            $data["total"] = number_format($order["order_total"], 2, ",", ".");
            $data["payment_id"] = $order["payment_id"];
            $data["customer_name"] = $order["customer_name"];
            $data["order_address"] = $order["address"];
            $data["picker_name"] = $order["picker_name"];
            if ($order["is_discounted"] != 0) {
                $data["is_discounted"] = 1;
                $data["used_discount_code"] = $order["used_discount_code"];
            }

            $products = $this->order_products_model
                ->select("order_products.product as 'ID',products.product_name,order_products.quantity,order_products.order_product_price,image")
                ->join("products", "products.ID=order_products.product")
                ->join("product_images", "product_images.product=products.ID")
                ->where(["order_id" => $json["order_id"], "is_main" => 1])
                ->findAll();
            foreach ($products as $p) {
                # code...
                $data["products"][$p["ID"]]["product_name"] = $p["product_name"];
                $data["products"][$p["ID"]]["product_price"] = number_format($p["order_product_price"], 2, ".", ",");
                $data["products"][$p["ID"]]["product_quantity"] = $p["quantity"];
                $data["products"][$p["ID"]]["product_image"] = $p["image"];
            }
            echo json_encode($data);
        }
        die();
    }
    public function search()
    {
        $request = \Config\Services::request();
        if ($request->isAJAX()) {
            $json = $request->getJSON(true);
            $data = [
                "orders" => []
            ];
            $orders = $this->orders_model
                ->select("customer.full_name as 'customer_name',orders.ID as 'order_id',payment_id,customer.ID as 'customer_id',order_date,order_statuses.status,orders.order_status as 'order_status_id',order_total,")
                ->join("customer", "customer.ID=orders.customer_id", "inner")
                ->join("order_statuses", "order_statuses.ID=orders.order_status", "inner")
                ->like("payment_id", $json["payment_id"])
                ->findAll();
            foreach ($orders as $order) {
                # code...
                $data["orders"][$order["order_id"]]["order_id"] = $order["order_id"];
                $data["orders"][$order["order_id"]]["payment_id"] = $order["payment_id"];
                $data["orders"][$order["order_id"]]["customer_name"] = $order["customer_name"];
                $data["orders"][$order["order_id"]]["customer_id"] = $order["customer_id"];
                $data["orders"][$order["order_id"]]["order_date"] = $order["order_date"];
                $data["orders"][$order["order_id"]]["order_status"] = $order["order_status_id"];
                $data["orders"][$order["order_id"]]["order_status_txt"] = $order["status"];
                $data["orders"][$order["order_id"]]["order_total"] = number_format($order["order_total"], 2, ",", ".");
            }
            echo json_encode($data);
        }
        die();
    }
    public function edit_order()
    {
        $request = \Config\Services::request();
        if ($request->isAjax()) {
            $json = $request->getJSON(true);
            $this->db->transStart();
            $this->orders_model->update($json["ID"], ["order_status" => $json["status"]]);
            $this->db->transComplete();
            if ($this->db->transStatus() != false) {
                echo 1;
            }
        }
        die();
    }
    public function delete_order()
    {
        $request = \Config\Services::request();
        if ($request->isAjax()) {
            $json = $request->getJSON(true);
            $this->orders_model->delete($json);
            if ($this->db->affectedRows() > 0) {
                echo "1";
            }
        }
        die();
    }
}
