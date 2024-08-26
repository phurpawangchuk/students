<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
       public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('course_code'); // Course code
        $table->string('course_name'); // Course Name
        $table->integer('credits');    // Credits
        $table->string('grade')->nullable(); // Grade
        $table->string('category');    // Category
        $table->boolean('repeat')->default(false); // Repeat
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};