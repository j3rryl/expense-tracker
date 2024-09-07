<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        //Create user
        $data = array(
            "username"=>"superadmin",
        );
        
        $builder = $this->db->table('users');
        $existingUser = $builder->where('username', $data['username'])->get()->getRow();
        if (!$existingUser) {
            $builder->insert($data);
            $userId = $this->db->insertID();
        } else {
            $userId = $existingUser->id;;
        }

        
        // Add Auth Identitiy
        $identities = array(
            "user_id"=> $userId,
            "type"=> "email_password",
            "name"=> "Super Admin",
            "secret"=> "super@admin.com",
            "secret2"=> password_hash("password", PASSWORD_DEFAULT)
        );
        $i_builder = $this->db->table('auth_identities');
        $existingIdentity = $i_builder->where('user_id', $identities['user_id'])->get()->getRow();
        if (!$existingIdentity) {
            $i_builder->insert($identities);
        } else {
            $i_builder->where('user_id', $identities['user_id'])->update($identities);
        }

        // Add user to group
        $group = array(
            "user_id"=> $userId,
            "group"=> "superadmin",
            "created_at"=> date('Y-m-d H:i:s')
        );
        $g_builder = $this->db->table('auth_groups_users');
        $existingIdentity = $g_builder->where('user_id', $group['user_id'])->get()->getRow();
        if (!$existingIdentity) {
            $g_builder->insert($group);
        } else {
            $g_builder->where('user_id', $group['user_id'])->update($group);
        }

    }
}
