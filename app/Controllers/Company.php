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
        if (empty($company)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Company not found');
        }

        return view('company/index', [
            'company' => $company
        ]);
    }

    public function create()
    {
        return view('company/create');
    }

    public function save()
    {
        $this->companyModel->save([
            'company_name' => $this->request->getVar('companyName'),
            'company_phone' => $this->request->getVar('phoneNumber'),
            'company_address' => $this->request->getVar('companyAddress'),
        ]);

        return redirect()->to('/company/index');
    }
}
