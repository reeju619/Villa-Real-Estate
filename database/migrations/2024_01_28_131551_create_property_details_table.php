<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('property_details', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->string('property_image')->nullable();
            $table->string('category_name');
            $table->string('price');
            $table->text('address');
            $table->string('area');
            $table->integer('floor');
            $table->enum('parking', ['3 spots', '6 spots', '8 spots', '10 spots']);
            $table->string('bhk');
            $table->enum('user_type', ['admin', 'editor', 'viewer'])->default('viewer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('property_details');
    }
};
