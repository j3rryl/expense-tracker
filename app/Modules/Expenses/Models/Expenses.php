<?php

namespace App\Modules\Expenses\Models;

use CodeIgniter\Model;

class Expenses extends Model
{
    protected $table            = 'st_expenses';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $deletedField = 'deleted_at';
    protected $allowedFields = ['name', 'amount', 'category_id', 'user_id','date','description', 'created_at', 'updated_at', 'deleted_at']; 
    public function getExpensesWithCategories()
    {
        $userId = session()->get("user_id");
        return $this->select('expenses.*, categories.name as category_name')
                    ->where('expenses.user_id', $userId)
                    ->join('categories', 'expenses.category_id = categories.id', 'left')
                    ->orderBy('expenses.created_at', 'DESC')
                    ->findAll();
    }
}