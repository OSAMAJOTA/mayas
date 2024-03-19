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
            $table->string('agents_name_en');
            $table->string('login_name');
            $table->string('nash');
            $table->string('id_tybe');
            $table->string('id_num');
            $table->date('birth_date');
            $table->string('marital_status');
            $table->string('Accommodation_type');

            $table->integer('agent_phone1');
            $table->integer('agent_phone2');
            $table->integer('home_phone');

            $table->string('hood_ar');
            $table->string('hood_en');
            $table->string('add_ar');
            $table->string('add_en');
            $table->string('city_ar');
            $table->string('city_en');
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
