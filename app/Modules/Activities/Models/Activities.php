<?php

namespace App\Modules\Activities\Models;

use CodeIgniter\Model;

class Activities extends Model
{
    protected $table            = 'st_activities';
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ["activity", "user_id"];

    public function getActivities($admin=null)
    {
        $userId = session()->get("user_id");
        $builder = $this->select('activities.*, users.username as user_name')
                ->join('users', 'activities.user_id = users.id', 'left')
                ->orderBy('created_at', 'DESC'); 

        if ($admin === null) {
            $builder->where('activities.user_id', $userId);
        }
        
        return $builder->findAll(8);
    }
}