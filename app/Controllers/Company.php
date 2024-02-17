<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use Config\Session;

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
        session();
        $validation = \Config\Services::validation();
        return view('company/create', [
            'validation' => $validation
        ]);
    }

    public function edit()
    {
        $company_id = $this->request->uri->getSegment(2);
        $company = $this->companyModel->find($company_id);
        return view('company/edit', [
            'company' => $company
        ]);
    }

    public function update()
    {
        $company_id = $this->request->uri->getSegment(2);
        $this->companyModel->save([
            'company_id' => $company_id,
            'company_name' => $this->request->getVar('companyName'),
            'company_phone' => $this->request->getVar('phoneNumber'),
            'company_address' => $this->request->getVar('companyAddress'),
        ]);

        return redirect()->to('/company/index');
    }

    public function save()
    {

        if (!$this->validate([
            'companyName' => 'required',
            'phoneNumber' => 'required',
            'companyAddress' => 'required'
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/company/create')->withInput()->with('validation', $validation);
        }

        $this->companyModel->save([
            'company_name' => $this->request->getVar('companyName'),
            'company_phone' => $this->request->getVar('phoneNumber'),
            'company_address' => $this->request->getVar('companyAddress'),
        ]);

        return redirect()->to('/company/index');
    }
}
