<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'company_id' => 1,
                'employee_name' => 'John Doe',
                'employee_gender' => 1,
                'employee_birthday' => '1990-01-01',
                'employee_picture' => 'john.jpg',
                'employee_phone' => '081234567890'
            ],
            [
                'company_id' => 1,
                'employee_name' => 'Joni Doa',
                'employee_gender' => 1,
                'employee_birthday' => '1990-02-02',
                'employee_picture' => 'joni.jpg',
                'employee_phone' => '081234567123'
            ],
            [
                'company_id' => 1,
                'employee_name' => 'Jane Doe',
                'employee_gender' => 2,
                'employee_birthday' => '1990-03-03',
                'employee_picture' => 'jane.jpg',
                'employee_phone' => '081234567456'
            ],
            [
                'company_id' => 2,
                'employee_name' => 'Jana Doa',
                'employee_gender' => 1,
                'employee_birthday' => '1990-04-04',
                'employee_picture' => 'jana.jpg',
                'employee_phone' => '081234567789'
            ],

            [
                'company_id' => 2,
                'employee_name' => 'Emily Jones',
                'employee_gender' => 2,
                'employee_birthday' => '1992-11-23',
                'employee_picture' => 'emily.jpg',
                'employee_phone' => '206-555-0123'
            ],

            [
                'company_id' => 2,
                'employee_name' => 'Michael Smith',
                'employee_gender' => 1,
                'employee_birthday' => '1985-07-14',
                'employee_picture' => 'michael.jpg',
                'employee_phone' => '415-555-1234'
            ],

            [
                'company_id' => 3,
                'employee_name' => 'Sophia Garcia',
                'employee_gender' => 2,
                'employee_birthday' => '1998-03-09',
                'employee_picture' => 'sophia.jpg',
                'employee_phone' => '310-555-9876'
            ],

            [
                'company_id' => 3,
                'employee_name' => 'William Johnson',
                'employee_gender' => 1,
                'employee_birthday' => '1990-08-21',
                'employee_picture' => 'william.jpg',
                'employee_phone' => '785-555-5555'
            ],

            [
                'company_id' => 3,
                'employee_name' => 'Olivia Brown',
                'employee_gender' => 2,
                'employee_birthday' => '1995-12-25',
                'employee_picture' => 'olivia.jpg',
                'employee_phone' => '617-555-0000'
            ]
        ];

        $this->db->table('employee')->insertBatch($data);
    }
}
