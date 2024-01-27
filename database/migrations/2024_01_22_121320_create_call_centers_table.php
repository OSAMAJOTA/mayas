<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('call_centers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('call_id');
            $table->foreign('call_id')->references('id')->on('agents')->onDelete('cascade');
            $table->integer('dont_call_check')->nullable();
            $table->integer('emp_check')->nullable();
            $table->integer('tailor_check')->nullable();
            $table->integer('time_check')->nullable();
            $table->integer('loc_check')->nullable();
            $table->integer('price_check')->nullable();
            $table->integer('other_check')->nullable();
            $table->integer('vist_check')->nullable();

            $table->dateTime('vist_time')->nullable();
            $table->string('call_comment')->nullable();
            $table->string('Created_by', 999);
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
        Schema::dropIfExists('call_centers');
    }
}
