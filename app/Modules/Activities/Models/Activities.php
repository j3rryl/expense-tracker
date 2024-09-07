<?php

namespace App\Modules\Activities\Models;

use CodeIgniter\Model;

class Activities extends Model
{
    protected $table            = 'st_activities';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ["activity", "user_id"];

    public function getActivities()
    {
        $userId = session()->get("user_id");
        return $this->where('activities.user_id', $userId)
                ->orderBy('created_at', 'DESC') 
                ->findAll(6);
    }
}