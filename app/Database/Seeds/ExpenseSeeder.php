<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Modules\Activities\Models\Activities;
use App\Modules\Expenses\Models\Expenses;
use App\Modules\Categories\Models\Categories;
use App\Models\UserModel;

use Faker\Factory as Faker;

class ExpenseSeeder extends Seeder
{
    public function run()
    {
        //
        $faker = Faker::create();

        $activities = new Activities();
        $expenses = new Expenses();
        $categoryModel = new Categories();
        $userModel = new UserModel();

        $users = $userModel->findAll();
        $categories = $categoryModel->findAll();

        foreach ($users as $user) {
            $minExpense = 3;
            if($user['username']=='normal') {
                $minExpense = 6;
            } else {
                $minExpense = 3;
            }
            for ($i = 0; $i < rand($minExpense, 7); $i++) {
                $data = [
                    'name'        => $faker->sentence(3), 
                    'amount'      => $faker->randomFloat(2, 1000, 50000), 
                    'category_id' => $faker->randomElement(array_column($categories, 'id')),
                    'user_id'     => $user['id'], 
                    'date' => $faker->dateTimeThisYear()->format('Y-m-d'),
                    'description' => $faker->sentence(6), 
                    'created_at'  => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
                    'updated_at'  => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
                ];

                $this->db->table('expenses')->insert($data);
            }
        }

        $activities->save([
            "user_id"=> 1,
            "activity"=> "added new expenses for users"
        ]);
    }
}
