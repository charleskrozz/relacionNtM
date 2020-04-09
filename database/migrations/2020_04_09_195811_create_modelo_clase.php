<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeloClase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alu_nombre');
            $table->string('alu_apellidos');
            $table->date('alu_fecha_cacimeinto');
            $table->string('alu_cedula')->unique();
            $table->string('alu_correo')->unique();
            $table->string('alu_imagen');
            $table->timestamps();
        });

        Schema::create('clases', function (Blueprint $table){
            $table->increments('id');
            $table->string('cla_nombre')->unique();
            $table->string('cla_descripcion');
            $table->integer('cla_num_participantes');
            $table->string('cla_imagen');
            $table->float('cla_costo');
            $table->timestamps();
        });

        Schema::create('profesores', function (Blueprint $table){
            $table->increments('id');
            $table->string('pro_nombre');
            $table->string('pro_apellidos');
            $table->string('pro_cedula')->unique();
            $table->string('pro_correo')->unique();
            $table->string('pro_imagen');
            $table->timestamps();
        });

        Schema::create('alumno_clase',function(Blueprint $table){
            $table->increments('id');
            $table->integer('alu_id')->unsigned();
            $table->integer('cla_id')->unsigned();
            $table->foreign('alu_id')->references('id')->on('alumnos')->ondelete('cascade');
            $table->foreign('cla_id')->references('id')->on('clases')->ondelete('cascade');
            $table->timestamps();
        });

        Schema::create('profesor_clase',function (Blueprint $table){
            $table->increments('id');
            $table->integer('pro_id')->unsigned();
            $table->integer('cla_id')->unsigned();
            $table->foreign('pro_id')->references('id')->on('profesores')->ondelete('cascade');
            $table->foreign('cla_id')->references('id')->on('clases')->ondelete('cascade');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
        Schema::dropIfExists('clases');
        Schema::dropIfExists('tutores');
        Schema::dropIfExists('alumno_clase');
        Schema::dropIfExists('profesor_clase');
    }
}
