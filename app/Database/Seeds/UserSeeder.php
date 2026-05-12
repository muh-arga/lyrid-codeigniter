<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => password_hash(
                'admin123',
                PASSWORD_BCRYPT
            ),
            'role' => 'admin'
        ]);

        $this->db->table('users')->insert([
            'name' => 'User',
            'username' => 'user',
            'password' => password_hash(
                'user123',
                PASSWORD_BCRYPT
            ),
            'role' => 'user'
        ]);
    }
}
