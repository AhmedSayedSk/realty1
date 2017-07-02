<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory('App\Realty',30)->create();
        // $this->call(UsersTableSeeder::class);
        factory('App\User',30)->create();
    }

}
