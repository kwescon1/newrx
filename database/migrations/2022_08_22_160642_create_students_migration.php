<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('dob');
            $table->string('gender', 1);
            $table->string('username', 255)->unique();
            $table->string('email')->unique();
            $table->foreignId('school_id')->unsigned()->constrained('schools');
            $table->foreignId('hostel_id')->unsigned()->constrained('hostels');
            $table->string('password');
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
        Schema::dropIfExists('students_migration');
    }
}
