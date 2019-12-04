<?php

use Illuminate\Database\Seeder;

class NiveausTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Niveau1=App\Niveau::firstOrCreate(["name"=>"Aucun"],["uuid"=>Str::uuid()]);
        $Niveau2=App\Niveau::firstOrCreate(["name"=>"élementire"],["uuid"=>Str::uuid()]);
        $Niveau3=App\Niveau::firstOrCreate(["name"=>"Moyen"],["uuid"=>Str::uuid()]);
        $Niveau4=App\Niveau::firstOrCreate(["name"=>"secondaire "],["uuid"=>Str::uuid()]);
        $Niveau5=App\Niveau::firstOrCreate(["name"=>"superieur"],["uuid"=>Str::uuid()]);

    }
}
