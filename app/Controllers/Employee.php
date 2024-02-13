<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\EmployeeModel;

class Employee extends BaseController
{

    protected $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function listEmployees()
    {
        $company_id = $this->request->uri->getSegment(2);
        $employee = $this->employeeModel->where('company_id', $company_id)->findAll();

        if (empty($employee)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Employee not found');
        }

        return view('employee/listEmployees', [
            'employee' => $employee
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
        $this->employeeModel->save([
            'company_id' => $company_id,
            'employee_name' => $this->request->getVar('employeeName'),
            'employee_gender' => $this->request->getVar('employeeGender'),
            'employee_birthday' => $this->request->getVar('employeeBirthday'),
            'employee_picture' => $this->request->getVar('employeePicture'),
            'employee_phone' => $this->request->getVar('employeePhone'),
        ]);

        return redirect()->to('/company/' . $company_id . '/employees');
    }

    public function delete()
    {
        $company_id = $this->request->uri->getSegment(2);
        $employee_id = $this->request->uri->getSegment(4);
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
        $company_id = $this->request->uri->getSegment(2);
        $this->employeeModel->save([
            'employee_id' => $this->request->uri->getSegment(4),
            'company_id' => $company_id,
            'employee_name' => $this->request->getVar('employeeName'),
            'employee_gender' => $this->request->getVar('employeeGender'),
            'employee_birthday' => $this->request->getVar('employeeBirthday'),
            'employee_picture' => $this->request->getVar('employeePicture'),
            'employee_phone' => $this->request->getVar('employeePhone'),
        ]);

        return redirect()->to('/company/' . $company_id . '/employees');
    }
}
