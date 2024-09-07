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

    public function getMonthlySums()
    {
        $userId = session()->get("user_id");
        return $this->select('SUM(amount) as total_amount, category_id, DATE_FORMAT(date, "%Y-%m") as month')
                    ->where('expenses.user_id', $userId)
                    ->groupBy('category_id, month')
                    ->findAll();
    }

    public function getTotalByCategory()
    {
        $userId = session()->get("user_id");
        return $this->select('category_id, SUM(amount) as total_amount')
                    ->where('expenses.user_id', $userId)
                    ->groupBy('category_id')
                    ->findAll();
    }
    
}