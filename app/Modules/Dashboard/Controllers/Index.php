<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use App\Modules\Expenses\Models\Expenses;

class Index extends BaseController
{
    protected $folder_directory = "Modules\\Dashboard\\Views\\";
    protected $parent_directory = "Modules\\Views\\index";
    protected $expenses;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->expenses = new Expenses();
    }

    public function index()
    {
        $this->expenses = $this->expenses->getExpensesWithCategories();
        $this->data['expense_count'] = count($this->expenses);
        $this->data['expense_amount'] = array_sum(array_column($this->expenses, 'amount'));
        $this->data['expense_categories'] = count(array_unique(array_column($this->expenses, 'category_id')));
        $this->data['page_title'] = 'Dashboard';
        $this->data['page_header'] = 'Dashboard';
        $this->data['contents'] = [
            $this->folder_directory . 'index',
        ];
        return self::render('index');
    }

    public function render(string $page): string
    {
        return view( $this->parent_directory, $this->data);
    }
}