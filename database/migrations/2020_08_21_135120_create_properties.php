<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            // $table->increments('id');
            $table->uuid('id')->primary();
            $table->string('email', 200);
            $table->string('street', 200);
            $table->string('number', 200);
            $table->string('complement', 200)->nullable();
            $table->string('district', 200);
            $table->string('city', 200);
            $table->string('state', 200);
            $table->string('contract_id')->nullable()->index();
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->softDeletes();
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
        Schema::dropIfExists('properties');
    }
}
