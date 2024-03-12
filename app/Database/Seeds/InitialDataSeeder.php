<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        $this->call('InitialUserSeeder');
        $this->call('InitialBookSeeder');
    }
}
