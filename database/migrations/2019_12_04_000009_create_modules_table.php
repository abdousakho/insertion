<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'modules';

    /**
     * Run the migrations.
     * @table modules
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('intitule')->nullable();
            $table->date('anne')->nullable();
            $table->unsignedInteger('domaines_id');
            $table->unsignedInteger('niveaus_id');

            $table->index(["niveaus_id"], 'fk_modules_niveaus1_idx');

            $table->index(["domaines_id"], 'fk_modules_domaines1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('domaines_id', 'fk_modules_domaines1_idx')
                ->references('id')->on('domaines')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('niveaus_id', 'fk_modules_niveaus1_idx')
                ->references('id')->on('niveaus')
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
