<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'email'      => 'carlosaponte@gmail.com',
            'password'   => bcrypt('123456'),
            'first_name' => 'CARLOS',
            'last_name'  => 'APONTE',
            'secret_question' => 'Nombre de mi perro',
            'secret_answer' => bcrypt('scooby')
        ]);
        \DB::table('role_users')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
        \DB::table('gods')->insert([
            'user_id' => 1
        ]);
        \DB::table('activations')->insert([
            'user_id'   => 1,
            'code'      => 'FMslNOp94SjdZ167mNqHRngR1Ex87a4V',
            'completed' => 1
        ]);
        //---------------------------------------------------------
        \DB::table('users')->insert([
            'email'      => 'tatiana@gmail.com',
            'password'   => bcrypt('123456'),
            'first_name' => 'TATIANA',
            'last_name'  => 'BUENDIA',
            'secret_question' => 'Nombre de mi perro',
            'secret_answer' => bcrypt('scooby')
        ]);
        \DB::table('role_users')->insert([
            'user_id' => 2,
            'role_id' => 2
        ]);
        \DB::table('activations')->insert([
            'user_id'   => 2,
            'code'      => 'FMslNOp94SjdZ167mNqHRngR1Ex87a4V',
            'completed' => 1
        ]);
        //---------------------------------------------------------
        \DB::table('users')->insert([
            'email'      => 'saul@gmail.com',
            'password'   => bcrypt('123456'),
            'first_name' => 'SAUL',
            'last_name'  => 'MORA',
            'secret_question' => 'Nombre de mi perro',
            'secret_answer' => bcrypt('scooby')
        ]);
        \DB::table('role_users')->insert([
            'user_id' => 3,
            'role_id' => 3
        ]);
        \DB::table('activations')->insert([
            'user_id'   => 3,
            'code'      => 'FMslNOp94SjdZ167mNqHRngR1Ex87a4V',
            'completed' => 1
        ]);
    }

}
