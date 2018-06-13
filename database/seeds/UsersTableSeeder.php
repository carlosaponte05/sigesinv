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
            'email'      => 'cesar@gmail.com',
            'password'   => bcrypt('123456'),
            'first_name' => 'CESAR',
            'last_name'  => 'CHARACO',
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
    }

}
