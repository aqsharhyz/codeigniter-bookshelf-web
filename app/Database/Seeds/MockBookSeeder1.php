<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MockBookSeeder1 extends Seeder
{
    public function run()
    {
        $json_content = file_get_contents();
        $data = json_decode($json_content, true);
        $this->db->table('book')->insertBatch($data);
    }
}
