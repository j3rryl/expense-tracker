<?php

namespace App\Modules\Expenses\Models;

use CodeIgniter\Model;

class Expenses extends Model
{
    protected $table            = 'st_expenses';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [];
}