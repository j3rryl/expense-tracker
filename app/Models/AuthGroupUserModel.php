<?php
namespace App\Models;

use CodeIgniter\Model;

class AuthGroupUserModel extends Model
{
    protected $table      = 'auth_groups_users';
    protected $primaryKey = 'id';  
    protected $allowedFields = ['user_id', 'group'];

    // Method to get user's group
    public function getUserGroup($userId)
    {
        return $this->where('user_id', $userId)->first();
    }
}
