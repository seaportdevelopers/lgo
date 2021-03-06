<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idno')->unique(); //ABC123
            $table->integer('category')->default(1);
            $table->integer('status')->default(0); //0-laisva; 1-vaziuoja; 2-stovi parke; etc.
            $table->float('coordsx')->nullable(); //lokacija
            $table->float('corrdsy')->nullable(); //lokacija
            $table->string("manufacturer");
            $table->string("model");
            $table->integer("rlYear"); //pagaminimo metai
            $table->string("VIN")->nullable();
            $table->string("tchExpirationDate")->nullable(); //technines apziuros galiojimo pabaigos data
            $table->unsignedinteger("user_id")->nullable();
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
        Schema::dropIfExists('trucks');
    }
}
