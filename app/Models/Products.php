<?php

namespace App\Models;
use CodeIgniter\Model;

class Products extends Model{
    protected $table      = 'products';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["ID",'product_name','product_price','product_color','product_status',"product_category","product_brand","is_discounted","discounted_price","is_new","total_selled"];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;
}