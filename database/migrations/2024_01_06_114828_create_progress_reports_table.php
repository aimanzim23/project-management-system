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
        Schema::create('progress_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id'); // Foreign Key referencing Project.id
            $table->unsignedBigInteger('developer_id'); // Foreign Key referencing Developer.id
            $table->date('date');
            $table->string('status');
            $table->string('description');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('developer_id')->references('id')->on('developers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_reports');
    }
};
