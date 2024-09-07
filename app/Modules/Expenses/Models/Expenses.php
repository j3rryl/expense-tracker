<?php

namespace App\Modules\Expenses\Models;

use CodeIgniter\Model;

class Expenses extends Model
{
    protected $table            = 'st_expenses';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields = ['name', 'amount', 'category_id', 'user_id', 'created_at', 'updated_at', 'deleted_at']; 

}