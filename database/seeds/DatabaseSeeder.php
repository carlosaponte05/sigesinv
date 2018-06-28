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
        $this->call(RolesUserTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MaterialesSeeder::class);
        $this->call(ProveedoresSeeder::class);
    }
}
