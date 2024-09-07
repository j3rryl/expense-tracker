<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as Faker;
use CodeIgniter\Shield\Entities\User;
use App\Modules\Activities\Models\Activities;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $users = service('auth')->setAuthenticator(null)->getProvider();
        $activities = new Activities();

        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            
            $user = new User([
                'username' => $faker->userName,
                'email'    => $faker->email,
                'password' => 'password',
            ]);
            $users->save($user);
            $user = $users->findById($users->getInsertID());
            $user->addGroup('user');

        }

        $user = new User([
            'username' => "normal",
            'email'    => "normal@normal.com",
            'password' => 'password',
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('user');

        $activities->save([
            "user_id"=> 1,
            "activity"=> "created new users"
        ]);
    }
}
