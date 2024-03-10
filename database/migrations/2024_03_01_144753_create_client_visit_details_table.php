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
        Schema::create('client_visit_details', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->string('visitor_contact');
            $table->string('visitor_email');
            $table->string('gender');
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('property_details')->onDelete('cascade');
            $table->date('visit_date');
            $table->text('additional_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_visit_details');
    }
};
