<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiairesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'beneficiaires';

    /**
     * Run the migrations.
     * @table beneficiaires
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('structures_id');
            $table->unsignedInteger('niveau_id');
            $table->dateTime('date_debut')->nullable();
            $table->dateTime('date_fin')->nullable();
            $table->unsignedInteger('formations_id');
            $table->unsignedInteger('regions_id');
            $table->unsignedInteger('situationprofessionels_id');

            $table->index(["situationprofessionels_id"], 'fk_beneficiaires_situationprofessionels1_idx');

            $table->index(["structures_id"], 'fk_beneficiaire_structures1_idx');

            $table->index(["regions_id"], 'fk_beneficiaires_regions1_idx');

            $table->index(["users_id"], 'fk_beneficiaire_users1_idx');

            $table->index(["niveau_id"], 'fk_beneficiaire_niveau1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('users_id', 'fk_beneficiaire_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('structures_id', 'fk_beneficiaire_structures1_idx')
                ->references('id')->on('operateurs')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('niveau_id', 'fk_beneficiaire_niveau1_idx')
                ->references('id')->on('niveaus')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('regions_id', 'fk_beneficiaires_regions1_idx')
                ->references('id')->on('regions')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('situationprofessionels_id', 'fk_beneficiaires_situationprofessionels1_idx')
                ->references('id')->on('situationprofessionels')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
