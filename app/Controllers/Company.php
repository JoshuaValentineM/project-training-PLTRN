<?php

namespace App\Controllers;

use App\Models\CompanyModel;

class Company extends BaseController
{

    protected $companyModel;

    public function __construct()
    {
        $this->companyModel = new CompanyModel();
    }

    public function index()
    {

        $company = $this->companyModel->findAll();

        // $data = [
        //     'company' => $company
        // ];

        // return view('company/index', $data);

        return view('company/index', [
            'company' => $company
        ]);
    }
}
