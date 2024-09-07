<?php

namespace App\Modules\Activities\Controllers;

use App\Controllers\BaseController;
use App\Modules\Activities\Models\Activities;

class Index extends BaseController
{
    protected $folder_directory = "Modules\\Activities\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new Activities;
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