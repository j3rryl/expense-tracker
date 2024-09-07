<?php

namespace App\Modules\Activites\Controllers;

use App\Controllers\BaseController;
use App\Modules\Activites\Models\Activites;

class Index extends BaseController
{
    protected $folder_directory = "Modules\\Activites\\Views\\";
    protected $model;
    protected $data = [];
    protected $rules = [];

    public function __construct()
    {
        $this->model = new Activites;
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