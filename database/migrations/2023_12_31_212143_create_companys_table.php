<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {

            $table->id();
           $table->string('companys_name');
            $table->string('registration_num')->nullable();
            $table->string('vat_num')->nullable();
            $table->string('city')->nullable();
            $table->string('build_num')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('extra_num')->nullable();
            $table->string('road_nam')->nullable();
            $table->string('neigh_nam')->nullable();
            $table->string('branch_num')->nullable();
            $table->string('com_phone')->nullable();
            $table->string('com_email')->nullable();

            $table->string('authorized_nam')->nullable();
            $table->string('authorized_phone')->nullable();
            $table->string('authorized_email')->nullable();
            $table->string('note')->nullable();
            $table->string('Status');
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
        Schema::dropIfExists('companys');
    }
}
