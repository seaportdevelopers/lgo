<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->increments('id')->autoIncrement();
            $table->string('status'); // State 
            $table->string('idno'); //transport serial country number
            $table->integer('userInformed'); //user's id, who reported about the problem
            $table->text('description');
            $table->string('repairCompany'); //company that is responsible for the solution or fixment
            $table->date('repairDate'); //date that describes, when vechile have to be repaired
            $table->date('repairDateEnd'); //date that describes, when vechile has been fixed and the current problem was solved fully
            $table->integer('userResponsible'); //user's id, who is responsible for the vechile
            $table->float('repairsPrice'); //the price of the vechiles repair
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repairs');
    }
}
