<?php

use Illuminate\Database\Seeder;

class OperateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Operateur::class,10)->create();

        $generator=Gen::create();
        factory(App\Client::class,5)->create()->each(function($operateur,$key) use($generator){
            $id_beneficiaire=factory(App\Beneficiaire::class)->create()->id;
            $id_operateur=factory(App\Operateur::class)->create(["operateurs_id"=>$operateur->id,"beneficiaires_id"=>$id_operateur])->id;
           
        });
    }
}
