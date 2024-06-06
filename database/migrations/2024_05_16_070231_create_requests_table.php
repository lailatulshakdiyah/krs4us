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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('user_nim');
            $table->string('course_code');
            $table->enum('course_type', ['kuliah', 'praktikum', 'responsi']);
            $table->unsignedBigInteger('course_src_id');
            $table->unsignedBigInteger('course_dest_id');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            
            $table->foreign('user_nim')->references('nim')->on('users')->onDelete('cascade');
            $table->foreign('course_src_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('course_dest_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
