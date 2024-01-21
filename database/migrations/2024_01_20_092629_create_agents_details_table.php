<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agents_id')->nullable();
            $table->string('type', 999);

            $table->string('Created_by', 999);
            $table->string('emp_name', 999)->nullable();
            $table->foreign('agents_id')->references('id')->on('agents')->onDelete('cascade');
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
        Schema::dropIfExists('agents_details');
    }
}
