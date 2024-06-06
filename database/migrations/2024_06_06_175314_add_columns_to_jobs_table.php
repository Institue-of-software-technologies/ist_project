<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToJobsTable extends Migration
{
public function up()
{
Schema::table('jobs', function (Blueprint $table) {
$table->string('company_name');
$table->enum('job_type', ['full-time', 'part-time', 'contract']);
$table->string('experience_level');
$table->string('education_level');
$table->text('skills');
});
}

public function down()
{
Schema::table('jobs', function (Blueprint $table) {
$table->dropColumn('company_name');
$table->dropColumn('job_type');
$table->dropColumn('experience_level');
$table->dropColumn('education_level');
$table->dropColumn('skills');
});
}
}
