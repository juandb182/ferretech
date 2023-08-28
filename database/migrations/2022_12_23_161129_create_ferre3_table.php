<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerre3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferre3s', function (Blueprint $table) {
            $table->id();
            $table->string("CODIGO");
            $table->text("PRODUCTO");
            $table->double("PRECIO");
            $table->integer("EXISTENCIA")->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ferre3');
    }
}
