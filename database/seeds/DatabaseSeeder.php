<?php

use App\User;
use App\Utilities\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => Generator::shortUUID(),
            'name' => 'Admin SSI',
            'email' => 'admin.ssi@cvssi.com',
            'password' => Hash::make('secret 57554'),
            'image' => 'user.png'
        ]);
    }
}