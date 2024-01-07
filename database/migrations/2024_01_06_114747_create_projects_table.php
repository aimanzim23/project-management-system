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
//            $table->unsignedBigInteger('bu_id'); // Foreign Key referencing Business_Unit.BU_ID
            $table->string('name');
            $table->unsignedBigInteger('manager_id'); // Foreign Key referencing Manager.ManagerID
            $table->unsignedBigInteger('business_unit_id'); // Foreign Key referencing Business_Unit.BU_ID
            $table->date('start_date');
            $table->date('end_date');
            $table->string('duration');
            $table->string('status');
            $table->string('description');
//            $table->string('methodology');
//            $table->string('platform');
//            $table->string('deployment_type');
            $table->unsignedBigInteger('developer_id'); // Foreign Key referencing Developer.id
            $table->timestamps();

            // Foreign key constraints
//            $table->foreign('BU_ID')->references('BU_ID')->on('business_unit');
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->foreign('developer_id')->references('id')->on('developers');
            $table->foreign('business_unit_id')->references('id')->on('business_units');

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
