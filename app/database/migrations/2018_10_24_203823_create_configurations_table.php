<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConfigurationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('academic_period')->unique();
            $table->string('min_credit_units');
            $table->string('min_hour_community_service');
            $table->string('min_hour_weeks');
            $table->date('registration_date');
            $table->date('registration_final_date');
            $table->date('date_int_community_service');
            $table->date('date_fin_community_service');
            $table->string('coordinator_full_name');
            $table->string('coordinator_identification');
            $table->enum('status', ['active', 'deactivated'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('configurations');
    }
}
