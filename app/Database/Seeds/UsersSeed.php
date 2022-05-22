<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use App\Entities\User as EntitiesUser;

class UsersSeed extends Seeder
{
    public function run()
    {
        // Data Role
        $this->db->table('auth_groups')->insert([
            'name'        => 'admin',
            'description' => 'Administrator',
        ]);

        // User
        $user = new UserModel();
        $user->withGroup('admin')->save(new EntitiesUser([
            'id'       => '',
            'email'    => 'int.halim@gmail.com',
            'username' => 'admin',
            'password' => 'admin12345',
            'active'   => 1,
        ]));
    }
}
