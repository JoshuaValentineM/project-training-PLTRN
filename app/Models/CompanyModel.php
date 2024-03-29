<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'company_id';
    protected $allowedFields = ['company_name', 'company_phone', 'company_address'];
}
