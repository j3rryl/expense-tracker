<?php

namespace App\Modules\Categories\Models;

use CodeIgniter\Model;

class Categories extends Model
{
    protected $table            = 'st_categories';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ["name"];
}