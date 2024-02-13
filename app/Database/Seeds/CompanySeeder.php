<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'company_name' => 'PT. ABC',
                'company_address' => 'Jl. Raya No. 123',
            ],
            [
                'company_name' => 'PT. DEF',
                'company_address' => 'Jl. Raya No. 456',
            ],
            [
                'company_name' => 'PT. GHI',
                'company_address' => 'Jl. Raya No. 789',
            ],
        ];

        $this->db->table('company')->insertBatch($data);
    }
}
