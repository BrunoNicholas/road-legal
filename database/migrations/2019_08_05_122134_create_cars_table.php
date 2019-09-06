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
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('car_owner_id')->unsigned(); // policy holder
            $table->string('car_category')->default('private')->nullable(); // company_owned
            $table->string('car_model'); // make
            $table->string('reg_no');
            $table->string('policy_no')->nullable();
            $table->string('no_plate');
            $table->integer('seating_capacity')->nullable();
            $table->double('gross_weight')->default(0.0)->nullable();
            $table->double('car_price')->default(0.0)->nullable();
            $table->double('premium_charged')->default(0.0)->nullable();
            $table->string('price_units')->default('UGX')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->date('date_of_expiry')->nullable();
            $table->string('issuing_authority')->nullable();
            $table->string('status')->default('pending')->nullable();
            
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
