<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(RoleTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(ProductTableSeeder::class);
         $this->call(SliderDatabaseSeeder::class);
         $this->call(AttributeTableSeeder::class);

         DB::unprepared(file_get_contents("database/sql/tables/cities.sql"));
    }
}
