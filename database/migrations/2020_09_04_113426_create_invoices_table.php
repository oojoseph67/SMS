<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('dob');
            $table->string('class');
            $table->string('gender');
            $table->string('student_id');
            $table->string('guardian_name');
            $table->string('guardian_email');
            $table->string('guardian_phoneNumber');
            $table->string('fee_type');
            $table->string('school_fees_price')->nullable();
            $table->string('pta_fees_price')->nullable();
            $table->string('reg_fees_price')->nullable();
            $table->string('lesson_fees_price')->nullable();
            $table->string('term');
            $table->string('section');
            $table->string('order_number');
            $table->date('order_date');
            $table->string('status');
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
        Schema::dropIfExists('invoices');
    }
}
