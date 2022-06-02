<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembrosProjetoTable extends Migration
{
    public function up()
    {
        Schema::create('membros_projeto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('projeto_id');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membros_projeto');
    }
}
