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
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AdministrateursTableSeeder::class);
        $this->call(GestionnairesTableSeeder::class);
        $this->call(NiveausTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(DomainesTableSeeder::class);
        $this->call(OperateursTableSeeder::class);
        $this->call(SituationprofessionelsTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        
        

       // $this->call(OperateursTableSeeder::class);
    }
}
