<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('agents_name');
            $table->unsignedBigInteger('companys_id');
            $table->foreign('companys_id')->references('id')->on('companys')->onDelete('cascade');
            $table->string('agents_phone');
            $table->string('tailor_num')->nullable();
            $table->date('first_tailor')->nullable();
            $table->date('end_tailor')->nullable();
            $table->date('agents_date');
            $table->decimal('rset',8,2)->nullable();
            $table->string('Status')->nullable();

            $table->integer('Status_id')->nullable();
            $table->unsignedBigInteger('employees_id')->nullable();
            $table->foreign('employees_id')->references('id')->on('users');
            $table->string('employees_name')->nullable();
            $table->string('man_note')->nullable();
            $table->dateTime('call_later')->nullable();
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
        Schema::dropIfExists('agents');
    }
}
