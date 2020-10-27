<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigns', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name');
            $table->string('classes');
            $table->string('teacher');
            $table->string('assignment_status')->default('NOT CREATED');
            $table->string('exam_status')->default('NOT CREATED');
            $table->string('exam_type')->nullable();
            $table->string('section')->nullable();
            $table->string('term')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('assigns');
    }
}
