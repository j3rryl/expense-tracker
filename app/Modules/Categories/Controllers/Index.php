<?php

namespace App\Modules\Categories\Controllers;

use App\Controllers\BaseController;
use App\Modules\Categories\Models\Categories;

class Index extends BaseController
{
    protected $folder_directory = "Modules\\Categories\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new Categories;
    }

    public function index()
    {
        return self::render('index');
    }

    public function render(string $page): string
    {
        return view( $this->folder_directory . $page, $this->data);
    }
}