<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'operateurs';

    /**
     * Run the migrations.
     * @table operateurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('nom', 200)->nullable();
            $table->date('anne')->nullable();
            $table->unsignedInteger('domaines_id');

            $table->index(["domaines_id"], 'fk_structures_domaines1_idx');
            $table->softDeletes();
            $table->nullableTimestamps();


            $table->foreign('domaines_id', 'fk_structures_domaines1_idx')
                ->references('id')->on('domaines')
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
