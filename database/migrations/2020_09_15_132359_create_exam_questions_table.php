<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();
            $table->string('subject_name');
            $table->string('class');
            $table->string('teacher');
            $table->string('exam_type');
            $table->string('type_both')->nullable();
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->string('question_right_mark')->nullable();
            $table->string('question_right_mark_obj')->nullable();
            $table->string('question_right_mark_theory')->nullable();
            $table->string('question');
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
            $table->string('answer');
            $table->string('section')->nullable();
            $table->string('term')->nullable();
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
        Schema::dropIfExists('exam_questions');
    }
}
