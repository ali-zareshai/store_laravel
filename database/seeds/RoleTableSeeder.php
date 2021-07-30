<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->adminRole();
        $this->poshtibanRole();
    }


    private function adminRole(){
        $role=factory(\App\Role::class)->make([
           'label'=>'admin',
           'name'=>'ادمین وب سایت'
        ]);

        $this->command->info('create admin role');
        $role->save();
    }

    private function poshtibanRole(){
        $role=factory(\App\Role::class)->make([
            'label'=>'poshtiban',
            'name'=>'پشتیبان وب سایت'
        ]);

        $this->command->info('create poshtiban role');
        $role->save();
    }
}
