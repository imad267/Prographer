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
        $user = App\User::create([
          'name' => 'imad zetouneh',
          'email' =>'imad@email.com',
          'password' =>bcrypt('12345678'),
          'admin'=>1
        ]);

        App\Profile::create([
          'user_id'=>$user->id,
          'avatar' =>'uploads/avatars/me.jpg',
          'about' => 'this is to talk about me ',

        ]);
    }
}
