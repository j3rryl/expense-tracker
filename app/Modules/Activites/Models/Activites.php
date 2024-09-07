<?php

namespace App\Modules\Activites\Models;

use CodeIgniter\Model;

class Activites extends Model
{
    protected $table            = 'st_activites';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = [];
}