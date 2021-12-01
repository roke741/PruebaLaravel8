<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiante1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante1s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codEst');
            $table->string('nomEst');
            $table->string('apeEst');
            $table->date('fnaEst');
            $table->integer('turMat');
            $table->integer('semMat');
            $table->integer('estMat');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiante1s');
    }
}
