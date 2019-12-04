<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'domaines';

    /**
     * Run the migrations.
     * @table domaines
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
            $table->unsignedInteger('niveau_id');

            $table->index(["niveau_id"], 'fk_domaines_niveau1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('niveau_id', 'fk_domaines_niveau1_idx')
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
