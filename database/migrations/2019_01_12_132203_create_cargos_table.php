<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("idno")->unique(); //ABC123
            $table->string("manufacturer");
            $table->string("model");
            $table->integer("rlYear"); //pagaminimo metai
            $table->integer("status")->default('0'); //0-laisva; 1-vaziuoja; 2-stovi parke; etc.
            $table->string("VIN")->nullable();
            $table->string("tchExpirationDate")->nullable(); //technines apziuros galiojimo pabaigos data
            $table->string("serfiticateType")->default("n"); //serfitikato tipas [nera, ATP, FTP]
            $table->string("serfiticateExpirationDate")->nullable(); //serfitikato galiojimo pabaigos data
            $table->unsignedinteger("truck_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
