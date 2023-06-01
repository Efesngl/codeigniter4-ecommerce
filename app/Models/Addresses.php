<?php

namespace App\Models;

use CodeIgniter\Model;

class Addresses extends Model{

    protected $table      = 'addresses';
    protected $primaryKey = 'ID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ["ID",'customer_id','address_name', 'city', 'full_address', "picker_first_name","picker_last_name","phone_number"];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;
}