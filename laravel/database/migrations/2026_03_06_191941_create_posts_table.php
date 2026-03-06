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
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // This maps to "id" in the local JSON file
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // This creates the link to the users table
            $table->string('title');
            $table->text('body');
            $table->timestamps(); // Adds nullable creation and update timestamps to the table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
