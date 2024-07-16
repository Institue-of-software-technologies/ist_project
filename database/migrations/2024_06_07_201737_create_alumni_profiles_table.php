<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('alumni_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('degree')->nullable();
            $table->year('graduation_year');
            $table->string('extra_course')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('current_job_title')->nullable();
            $table->string('current_employer')->nullable();
            $table->string('location')->nullable();
            $table->text('phone')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->text('social_media_links')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('alumni_profiles');
    }
}
