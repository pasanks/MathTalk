<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_d_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grade', 255)->nullable();
//            $table->string('code', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('description', 800)->nullable();
            $table->string('status', 1)->default('1');
            $table->string('fee_monthly', 15);
            $table->string('fee_weekly', 15);
            $table->string('enable_weekly_fee', 1);
            $table->string('trainer_name', 300);
            $table->string('max_students', 15)->nullable();
            $table->string('class_year',255);
            $table->string('class_date',255);
            $table->string('class_time',255);
            $table->string('zoom_id', 255)->nullable();
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
        Schema::dropIfExists('class_d_s');
    }
}
