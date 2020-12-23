<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tables', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->string('first_period')->nullable('Yet to be assigned');
            $table->string('second_period')->nullable('Yet to be assigned');
            $table->string('third_period')->nullable('Yet to be assigned');
            $table->string('fourth_period')->nullable('Yet to be assigned');
            $table->string('fifth_period')->nullable('Yet to be assigned');
            $table->string('sixth_period')->nullable('Yet to be assigned');
            $table->string('seventh_period')->nullable('Yet to be assigned');
            $table->string('eight_period')->nullable('Yet to be assigned');
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
        Schema::dropIfExists('time_tables');
    }
}
