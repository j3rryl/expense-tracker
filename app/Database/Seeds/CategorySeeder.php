<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Modules\Categories\Models\Categories;

class CategorySeeder extends Seeder
{
    public function run()
    {
        //
        $categoryModel = new Categories();
        $categories = [
            ['name' =>'Food & Dining'],
            ['name' =>'Transportation'],
            ['name' =>'Housing'],
            ['name' =>'Health & Wellness'],
            ['name' =>'Entertainment'],
            ['name' =>'Education'],
            ['name' =>'Clothing & Personal Care'],
            ['name' =>'Travel'],
            ['name' =>'Gifts & Donations'],
            ['name' =>'Miscellaneous']
        ];

        // Insert categories
        $categoryModel->insertBatch($categories);
    }
}
