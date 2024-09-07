<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';  
    protected $useSoftDeletes   = true;
    protected $deletedField = 'deleted_at';
    protected $allowedFields = ['username'];

    // Method to get user
    public function getUser($userId)
    {
        return $this->find($userId);
    }
}
