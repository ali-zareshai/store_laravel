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
        $this->createAdminUser();
        $this->createUser();
        $this->createUserPoshtiban();
        $this->createUserSeo();
    }
    private function createAdminUser()
    {

        $user = factory(\App\User::class)->make([
            'username' => 'ali_zareshahi',
            'fname' => 'آداک',
            'lname' => 'سنجش',
            'email' => 'razavi.ali.1998@gmail.com',
            'mobile' => '09339921070',
            'password' => '$2y$10$ISDc8R53vYUVZkIruHwI6.mPGTYAJrHv96sfBf5Li..0./w33SyW2'//123456789
        ]);
        $user->save();
        $this->command->info('create user admin');
    }


    private function createUser()
    {
        $user = factory(\App\User::class)->make([
            'username' => 'ali_razavi',
            'fname' => 'علی',
            'lname' => 'رضوی',
        ]);
        $user->save();
        $this->command->info('create user');
    }
    private function createUserPoshtiban()
    {
        $user = factory(\App\User::class)->make([
            'username' => 'user_1',
            'fname' => 'سارا',
            'lname' => 'رحیمی',
        ]);
        $user->save();
        $this->command->info('create user poshtiban');
    }
    private function createUserSeo()
    {
        $user = factory(\App\User::class)->make([
            'username' => 'user-2',
            'fname' => 'امیر حسین',
            'lname' => 'اطلاع حریری',
        ]);
        $user->save();
        $this->command->info('create user seo');
    }
}
