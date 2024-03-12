<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'Fulan',
                'password' => password_hash('fulan123', PASSWORD_DEFAULT),
                'fullname' => 'Fulan bin Fulan',
                'email' => 'fulan@gmail.com',
                'phone' => '081234567890'
            ],
            [
                'username' => 'Fulanah',
                'password' => password_hash('fulanah123', PASSWORD_DEFAULT),
                'fullname' => 'Fulanah binti Fulan',
                'email' => 'fulanah1@gmail.com',
                'phone' => '081234567892'
            ],
            [
                'username' => 'Budi',
                'password' => password_hash('budiyono123', PASSWORD_DEFAULT),
                'fullname' => 'Budi Yono',
                'email' => 'budiyono@gmail.com',
                'phone' => '081234567891'
            ]
        ];
        $this->db->table('user')->insertBatch($data);
    }
}
