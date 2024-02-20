<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'company_name' => 'PT. Polytron',
                'company_phone' => '021-12345678',
                'company_address' => 'Jl. Slipi No. 123',
            ],
            [
                'company_name' => 'PT. Tokopedia',
                'company_phone' => '021-23456789',
                'company_address' => 'Jl. Kuningan No. 456',
            ],
            [
                'company_name' => 'PT. Djarum',
                'company_phone' => '021-34567890',
                'company_address' => 'Jl. Sudirman No. 789',
            ],
        ];

        $this->db->table('company')->insertBatch($data);
    }
}
