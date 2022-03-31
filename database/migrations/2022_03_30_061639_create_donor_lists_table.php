<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->integer('age');
            $table->string('blood_group');
            $table->foreignId('state_id')->constrained('states','id');
            $table->foreignId('city_id')->constrained('cities','id');
            $table->bigInteger('phone');
            $table->date('covid_positive');
            $table->date('covid_negative');
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
        Schema::dropIfExists('donor_lists');
    }
}
