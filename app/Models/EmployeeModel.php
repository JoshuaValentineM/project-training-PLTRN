<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'employee_id';
    protected $foreignKey = 'company_id';
    protected $allowedFields = ['company_id', 'employee_name', 'employee_gender', 'employee_birthday', 'employee_picture', 'employee_phone'];
}
