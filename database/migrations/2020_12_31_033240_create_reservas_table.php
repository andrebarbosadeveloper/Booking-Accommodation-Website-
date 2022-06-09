<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reservas');
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('casa_id');
            $table->foreign('casa_id')->references('id')->on('casas');
            $table->string("FirstName");
            $table->string("LastName");
            $table->string("email");
            $table->date("Checkin");
            $table->date("Checkout");
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
        Schema::dropIfExists('reservas');
    }
}
