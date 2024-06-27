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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Adding user_id column
            $table->string('title');
            $table->text('problem_statement');
            $table->text('solution_proposed');
            $table->text('description');
            $table->string('flowchart_diagram')->nullable();
            $table->string('database_diagram')->nullable();
            $table->string('powerpoint')->nullable();
            $table->string('demo_url');
            $table->string('video_url');
            $table->string('tools_used');
            $table->string('programming_language');
            $table->string('github_repository');
            $table->softDeletes();
            $table->enum('visibility', ['public', 'private']);
            $table->timestamps();

            // Adding foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
