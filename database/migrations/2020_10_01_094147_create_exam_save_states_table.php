<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSaveStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_save_states', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('subject_name');
            $table->string('class');
            $table->string('section');
            $table->string('term');
            $table->string('type_both')->nullable();
            $table->string('question');
            $table->string('correct_answer');
            $table->string('user_answer');
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
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
        Schema::dropIfExists('exam_save_states');
    }
}
