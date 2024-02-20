<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\EmployeeModel;
use CodeIgniter\CLI\Console;

class Employee extends BaseController
{

    protected $employeeModel, $companyModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
        $this->companyModel = new CompanyModel();
    }

    public function listEmployees()
    {
        $company_id = $this->request->uri->getSegment(2);
        $company = $this->companyModel->find($company_id);
        $employee = $this->employeeModel->where('company_id', $company_id)->findAll();

        if (empty($employee)) {
            // return same view but give company id data 
            return view('employee/listEmployees', [
                'company_id' => $company_id,
                'company' => $company
            ]);
        }

        return view('employee/listEmployees', [
            'employee' => $employee,
            'company_id' => $company_id,
            'company' => $company
        ]);
    }

    public function create()
    {
        $company_id = $this->request->uri->getSegment(2);
        return view('employee/create', [
            'company_id' => $company_id
        ]);
    }

    public function save()
    {
        $company_id = $this->request->uri->getSegment(2);
        // dd('berhasil');
        $file_employee_picture = $this->request->getFile('employeePicture');

        // kalau ga ada gambar,
        if ($file_employee_picture->getError() == 4) {
            $file_name = 'default.jpg';
        } else {
            $file_name = $file_employee_picture->getRandomName();
            // dd($file_employee_picture);
            $file_employee_picture->move('img', $file_name);
        }

        $this->employeeModel->save([
            'company_id' => $company_id,
            'employee_name' => $this->request->getVar('employeeName'),
            'employee_gender' => $this->request->getVar('employeeGender'),
            'employee_birthday' => $this->request->getVar('employeeBirthday'),
            'employee_picture' => $file_name,
            'employee_phone' => $this->request->getVar('employeePhone'),
        ]);

        return redirect()->to('/company/' . $company_id . '/employees');
    }

    public function delete()
    {
        $company_id = $this->request->uri->getSegment(2);
        $employee_id = $this->request->uri->getSegment(4);

        $employee = $this->employeeModel->find($employee_id);
        if ($employee['employee_picture'] != 'default.jpg') {
            unlink('img/' . $employee['employee_picture']);
        }

        $this->employeeModel->delete($employee_id);
        return redirect()->to('/company/' . $company_id . '/employees');
    }

    public function edit()
    {
        $employee_id = $this->request->uri->getSegment(2);
        $employee = $this->employeeModel->find($employee_id);
        return view('employee/edit', [
            'employee' => $employee
        ]);
    }

    public function update()
    {

        $file_employee_picture = $this->request->getFile('employeePicture');

        if ($file_employee_picture->getError() == 4) {
            $file_name = $this->request->getVar('oldEmployeePicture');
        } else {
            $file_name = $file_employee_picture->getRandomName();
            $file_employee_picture->move('img', $file_name);
            unlink('img/' . $this->request->getVar('oldEmployeePicture'));
        }

        $company_id = $this->request->uri->getSegment(2);
        $this->employeeModel->save([
            'employee_id' => $this->request->uri->getSegment(4),
            'company_id' => $company_id,
            'employee_name' => $this->request->getVar('employeeName'),
            'employee_gender' => $this->request->getVar('employeeGender'),
            'employee_birthday' => $this->request->getVar('employeeBirthday'),
            'employee_picture' => $file_name,
            'employee_phone' => $this->request->getVar('employeePhone'),
        ]);

        return redirect()->to('/company/' . $company_id . '/employees');
    }

    public function view($employee_id)
    {
        // $employee_id = $this->request->uri->getSegment(2);
        $employee_id = (int) $employee_id;
        $employee = $this->employeeModel->where('employee_id', $employee_id)->findAll();
        return json_encode($employee);
    }
}
