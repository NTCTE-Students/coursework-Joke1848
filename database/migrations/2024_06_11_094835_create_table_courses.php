<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('course_creator_id') -> references ('id') -> on ('table_course_creators');
            $table->integer('popularity');
            $table->integer('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_courses');
    }
};
