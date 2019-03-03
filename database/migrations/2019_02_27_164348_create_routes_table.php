<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userCreated');
            $table->integer('type')->default(0);
            $table->string('POINT_A')->default("NONE");
            $table->string('POINT_B')->default("NONE");
            $table->string('client')->default("NOT GIVEN");
            $table->integer('driverID')->default(0);
            $table->integer('TruckID');
            $table->integer('CargoID');
            $table->integer('status')->default(0);
            $table->date('DrivenOut')->nullable();
            $table->date('DrivenIn')->nullable();
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
        Schema::dropIfExists('routes');
    }
}
