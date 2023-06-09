<?php

namespace App\Libraries;

use Config;

class Iyzico
{
    public $cart_model;
    public $product_model;
    public $customer_model;
    public $address_model;
    public $orders_model;
    public $order_pr_model;
    public $db;

    public function __construct()
    {
        $this->product_model= new \App\Models\Products();
        $this->db= \Config\Database::connect();
        $this->cart_model=new \App\Models\cart();
        $this->customer_model=new \App\Models\Customer();
        $this->address_model=new \App\Models\Addresses();
        $this->orders_model=new \App\Models\Orders();
        $this->order_pr_model=new \App\Models\order_products();
        session();
        helper("cookie");
    }
    public function payment(array $arr)
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey("your key here");
        $options->setSecretKey("your key here");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");
                
        $request = new \Iyzipay\Request\CreatePaymentRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId($arr["conservation"]);
        $request->setPrice($arr["total"]);
        $request->setPaidPrice($arr["total"]);
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setInstallment(1);
        $request->setBasketId($arr["conservation"]);
        $request->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        
        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName($arr["card"]["card_holder"]);
        $paymentCard->setCardNumber($arr["card"]["card_number"]);
        $paymentCard->setExpireMonth($arr["card"]["card_expire_month"]);
        $paymentCard->setExpireYear($arr["card"]["card_expire_year"]);
        $paymentCard->setCvc($arr["card"]["cvc"]);
        $paymentCard->setRegisterCard(0);
        $request->setPaymentCard($paymentCard);
        
        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($arr["buyer"]["ID"]);
        $buyer->setName($arr["buyer"]["name"]);
        $buyer->setIdentityNumber("12345");
        $buyer->setSurname($arr["buyer"]["surname"]);
        $buyer->setGsmNumber($arr["buyer"]["phone_number"]);
        $buyer->setEmail($arr["buyer"]["email"]);
        $buyer->setRegistrationAddress($arr["buyer"]["address"]);
        $buyer->setIp($arr["buyer"]["IP"]);
        $buyer->setCity($arr["buyer"]["city"]);
        $buyer->setCountry($arr["buyer"]["country"]);
        $request->setBuyer($buyer);
        
        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($arr["buyer"]["name"]);
        $shippingAddress->setCity($arr["buyer"]["city"]);
        $shippingAddress->setCountry($arr["buyer"]["country"]);
        $shippingAddress->setAddress($arr["buyer"]["address"]);
        $request->setShippingAddress($shippingAddress);
        
        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($arr["buyer"]["name"]);
        $billingAddress->setCity($arr["buyer"]["city"]);
        $billingAddress->setCountry($arr["buyer"]["country"]);
        $billingAddress->setAddress($arr["buyer"]["address"]);
        $request->setBillingAddress($billingAddress);
        
        $basketItems = [];
        foreach ($arr["basket"] as $b) {
            # code...
            $basketitem = new \Iyzipay\Model\BasketItem();
            $basketitem->setId($b["ID"]);
            $basketitem->setName($b["name"]);
            $basketitem->setCategory1($b["category"]);
            $basketitem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
            $basketitem->setPrice($b["price"]);
            array_push($basketItems,$basketitem);
        }  
        $request->setBasketItems($basketItems);
        $payment = \Iyzipay\Model\Payment::create($request, $options);
        if($payment->getStatus()=="success"){
            $order_arr=[
                "customer_id"=>$_SESSION["ID"],
                "order_status"=>1,
                "order_total"=>$arr["total"],
                "payment_id"=>$payment->getPaymentId(),
                "address"=>$arr["full_addres"]."/".$arr["city"]."/".$arr["phone_number"],
                "picker_name"=>$arr["name"]." ".$arr["surname"]
            ];
            if($arr["is_discounted"]==1){
                $order_arr["is_discounted"]=1;
                $order_arr["used_discount_code"]=$arr["used_discount_code"];
            }
            $this->orders_model->insert($order_arr);
            $order_pr_arr=[
                "order_id"=>$this->orders_model->where($order_arr)->find()[0]["ID"],
                "product"=>0,
                "quantity"=>0,
                "order_product_price"=>0
            ];
            foreach ($arr["basket"] as $b) {
                # code...
                $order_pr_arr["product"]=$b["ID"];
                $order_pr_arr["quantity"]=$b["quantity"];
                $order_pr_arr["order_product_price"]=$b["price"];
                $this->order_pr_model->insert($order_pr_arr);
            }
            $cart_arr=[
                "customer_id"=>$_SESSION["ID"],
            ];
            $this->cart_model->where($cart_arr)->delete();
        }
        return $payment->getStatus();
    }

}
