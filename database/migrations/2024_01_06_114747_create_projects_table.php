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
            $table->string('name');
//            $table->unsignedBigInteger('system_id'); // Foreign Key referencing System.SystemID (optional
            $table->unsignedBigInteger('manager_id'); // Foreign Key referencing Manager.ManagerID
            $table->unsignedBigInteger('business_unit_id'); // Foreign Key referencing Business_Unit.BU_ID
            $table->date('start_date');
            $table->date('end_date');
            $table->string('duration');
            $table->string('status');
            $table->string('description');
            $table->string('methodology');
            $table->string('platform');
            $table->string('deployment_type');

            $table->timestamps();

            // Foreign key constraints
//            $table->foreign('system_id')->references('id')->on('systems');
            $table->foreign('manager_id')->references('id')->on('managers');
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
