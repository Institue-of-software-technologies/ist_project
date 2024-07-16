<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->decimal('salary', 10, 2)->nullable();
            $table->unsignedBigInteger('user_id'); // Assuming user_id references the admin who posted the job
            $table->string('company_name');
            $table->enum('job_type', ['full-time', 'part-time', 'contract']);
            $table->string('experience_level');
            $table->string('education_level');
            $table->text('skills');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
;
