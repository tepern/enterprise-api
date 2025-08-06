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
        Schema::create('organization_activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('organization_id');
            $table->unsignedInteger('activity_id');
            $table->timestamps();

            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('activity_id')->references('id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_activity');
    }
};
