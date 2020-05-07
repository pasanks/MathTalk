<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('class_id', 255)->nullable();
            $table->string('session_title', 255)->nullable();
            $table->string('use_class_dates', 1)->nullable();
            $table->string('use_class_fees', 1)->nullable();
            $table->string('enable_weekly_fee', 1)->nullable();
            $table->string('weekly_fee', 20)->nullable();
            $table->string('monthly_fee', 20)->nullable();
            $table->string('year', 50)->nullable();
            $table->string('date', 50)->nullable();
            $table->string('time', 50)->nullable();
            $table->string('session_date',100)->nullable();
            $table->string('status',1)->default('1');
            $table->string('created_by', 10)->nullable();
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
        Schema::dropIfExists('class_sessions');
    }
}
