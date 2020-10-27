<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->unique()->nullable();
            $table->date('dob');
            $table->string('gender');
            $table->string('entry_class')->nullable();
            $table->string('current_class')->nullable();
            $table->string('promotion_class')->nullable();
            $table->string('term')->nullable();
            $table->string('section')->nullable();
            $table->string('staff_phoneNumber')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_email');
            $table->string('guardian_phoneNumber');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('student_id')->nullable()->unique();
            $table->string('staff_id')->nullable()->unique();
            $table->string('role')->default('STUDENT');
            $table->string('profile_pic');
            $table->string('manuscript')->nullable();
            $table->string('cv')->nullable();
            $table->string('reg_payment')->default('NOTPAID');
            $table->string('reg_fees_invoice')->nullable();
            $table->string('school_fees_payment')->default('NOTPAID');
            $table->string('school_fees_invoice')->nullable();
            $table->string('pta_fees_payment')->default('NOTPAID');
            $table->string('pta_fees_invoice')->nullable();
            $table->string('lesson_fees_payment')->default('NOTPAID');
            $table->string('lesson_fees_invoice')->nullable();
            $table->int('reg_fees_price')->default('50000');
            $table->int('school_fees_price')->default('30000000');
            $table->int('pta_fees_price')->default('2000000');
            $table->int('lesson_fees_price')->default('100000');
            $table->string('admission_status')->default('NOTGIVEN');
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
        Schema::dropIfExists('users');
    }
}
