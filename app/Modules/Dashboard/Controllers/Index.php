<?php

namespace App\Modules\Dashboard\Controllers;

use App\Controllers\BaseController;
use App\Modules\Expenses\Models\Expenses;
use App\Modules\Categories\Models\Categories;

class Index extends BaseController
{
    protected $folder_directory = "Modules\\Dashboard\\Views\\";
    protected $parent_directory = "Modules\\Views\\index";
    protected $expenses;
    protected $categories;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->expenses = new Expenses();
        $this->categories = new Categories();
    }

    public function index()
    {
        $expensesData = $this->expenses->getMonthlySums();
        // Charts
        $categories = []; 
        $seriesData = []; 
        $monthNames = [];

        for ($i = 1; $i <= 12; $i++) {
            $monthNames[] = date('F', mktime(0, 0, 0, $i, 10));
        }
        $seriesData = array_fill_keys(array_keys($categories), array_fill(0, 12, 0));

    
        foreach ($expensesData as $data) {
            $monthNumber = (int)date('m', strtotime($data['month'] . '-01')); // Extract month number
            $monthIndex = $monthNumber - 1;
            $categoryId = $data['category_id'];
            $totalAmount = $data['total_amount'];

            if (!isset($categories[$categoryId])) {
                $category = $this->categories->find($categoryId);
                $categories[$categoryId] = $category['name'];
            }

            if (!isset($seriesData[$categoryId])) {
                $seriesData[$categoryId] = array_fill(0, 12, 0);
            }
            $seriesData[$categoryId][$monthIndex] = $totalAmount;
        }

        // Format series data for ApexCharts
        $chartSeries = [];
        foreach ($categories as $categoryId => $categoryName) {
            $chartSeries[] = [
                'name' => $categoryName,
                'data' => $seriesData[$categoryId]
            ];
        }
        
        $this->data['chartSeries'] = $chartSeries;
        $this->data['months'] = $monthNames;


        $categories = []; 
        $expensesData = $this->expenses->getTotalByCategory();
        foreach ($expensesData as $data) {
            $categoryId = $data['category_id'];
            $totalAmount = $data['total_amount'];

            if (!isset($categories[$categoryId])) {
                $category = $this->categories->find($categoryId);
                $categories[$categoryId] = [
                    'name' => $category['name'],
                    'total_amount' => 0
                ];
            }

            $categories[$categoryId]['total_amount'] += $totalAmount;
        }

        $pieSeries = [];
        foreach ($categories as $category) {
            $pieSeries[] = [
                'name' => $category['name'],
                'data' => $category['total_amount']
            ];
        }

        $this->data['pieSeries'] = $pieSeries;


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