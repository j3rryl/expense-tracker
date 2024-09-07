<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';  
    protected $allowedFields = ['username', 'name'];

    // Method to get user
    public function getUser($userId)
    {
        return $this->find($userId);
    }
}
