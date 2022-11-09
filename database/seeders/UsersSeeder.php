<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{

    protected $users = [
        [
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'password'  => 'admin123',
            'state'     => 'approved'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user_data) {
            $user = User::where('email', $user_data['email'])->first();

            if ($user) {
                continue;
            }

            $user = new User;
            $user->name     = $user_data['name'];
            $user->email     = $user_data['email'];
            $user->password     = Hash::make($user_data['password']);
            $user->state     = $user_data['state'];
            $user->save();
        }
    }
}
