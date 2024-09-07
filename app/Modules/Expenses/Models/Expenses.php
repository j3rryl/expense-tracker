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
    public function getExpensesWithCategories($admin=null)
    {
        $userId = session()->get("user_id");
    
        // Start building the query
        $builder = $this->select('expenses.*, categories.name as category_name, users.username as user_name')
                        ->join('users', 'expenses.user_id = users.id', 'left')
                        ->join('categories', 'expenses.category_id = categories.id', 'left')
                        ->orderBy('expenses.created_at', 'DESC');
        
        // Apply the user_id filter if not admin
        if ($admin === null) {
            $builder->where('expenses.user_id', $userId);
        }
        
        return $builder->findAll();
    }

    public function getExpensesByUser($id)
    {    
        // Start building the query
        $builder = $this->select('expenses.*, categories.name as category_name, users.username as user_name')
                        ->where('expenses.user_id', $id)
                        ->join('users', 'expenses.user_id = users.id', 'left')
                        ->join('categories', 'expenses.category_id = categories.id', 'left')
                        ->orderBy('expenses.created_at', 'DESC');
        
        return $builder->findAll();
    }
    
    public function getArchived($admin=null)
    {
    
        // Start building the query
        $builder = $this->select('expenses.*, categories.name as category_name, users.username as user_name')
                        ->join('users', 'expenses.user_id = users.id', 'left')
                        ->join('categories', 'expenses.category_id = categories.id', 'left')
                        ->orderBy('expenses.created_at', 'DESC');
        return $builder->onlyDeleted()->findAll();
    }

    public function getMonthlySums($admin=null)
    {
        $userId = session()->get("user_id");
        $builder = $this->select('SUM(amount) as total_amount, category_id, DATE_FORMAT(date, "%Y-%m") as month')
                    ->groupBy('category_id, month');

        if ($admin === null) {
            $builder->where('expenses.user_id', $userId);
        }
        
        return $builder->findAll();
    }

    public function getTotalByCategory($admin=null)
    {
        $userId = session()->get("user_id");
        $builder =  $this->select('category_id, SUM(amount) as total_amount')
                    ->groupBy('category_id');
        if ($admin === null) {
            $builder->where('expenses.user_id', $userId);
        }
        
        return $builder->findAll();
                    
    }
    
}