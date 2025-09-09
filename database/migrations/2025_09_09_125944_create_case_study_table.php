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
        Schema::create('case_study', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('summary');
            $table->text('body');
            $table->string('author');
            $table->string('category');
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_study');
    }
};
