<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Employee extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'employee_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'company_id' => [
                'type' => 'INT',
            ],
            'employee_gender'   => [
                'type' => 'INT',
            ],
            'employee_birthday' => [
                'type' => 'DATE',
            ],
            'employee_picture' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'employee_phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
        ]);
        $this->forge->addKey('employee_id', true);
        $this->forge->addForeignKey('company_id', 'company', 'company_id');
        $this->forge->createTable('employee');
    }

    public function down()
    {
        $this->forge->dropTable('employee');
    }
}
