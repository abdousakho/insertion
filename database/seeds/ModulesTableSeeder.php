<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Gen;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generator=Gen::create();
        factory(App\Module::class,5)->create()->each(function($formation,$key) use($generator){
            $id_niveau=factory(App\Niveau::class)->create()->id;
            $id_domaine=factory(App\Domaine::class)->create(["niveaus_id"=>$id_niveau])->id;

         /*    $facture=factory(App\Facture::class,5)->create()->each(function($facture,$k) use($id_compteur){
                factory(App\Consommation::class,10)->create(["compteurs_id"=>$id_compteur,"factures_id"=>$facture->id]);
                factory(App\Reglement::class,10)->create(["factures_id"=>$facture->id,"montant"=>$facture->montant]);
            }); */
        });
    }
}
