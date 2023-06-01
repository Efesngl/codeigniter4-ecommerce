<?php
namespace App\Models;
use CodeIgniter\Model;

class Orders extends Model{
    protected $table      = 'orders';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['customer_id','payment_id', 'order_date', 'order_status', 'order_total',"is_discounted","used_discount_code","address","picker_name"];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;
}