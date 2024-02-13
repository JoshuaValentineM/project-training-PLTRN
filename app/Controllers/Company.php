<?php

namespace App\Controllers;

class Company extends BaseController
{
    public function index()
    {
        $CompanyModel = new \App\Models\CompanyModel();
        $company = $CompanyModel->findAll();
    }
}
