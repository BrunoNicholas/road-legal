<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('car_model');
            $table->string('no_plate');
            $table->integer('car_owner_id')->unsigned();
            $table->integer('company_id')->unsigned()->nullable();
            $table->string('car_category')->default('private'); // company_owned
            $table->double('car_price')->default(0.0)->nullable();
            $table->string('price_units')->default('UGX')->nullable();
            
            $table->timestamps();

            $table->foreign('car_owner_id')->references('id')->on('car_owners')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
