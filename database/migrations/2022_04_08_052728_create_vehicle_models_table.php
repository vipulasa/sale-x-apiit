<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_models', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('manufacturer_id')->unsigned(); // bigint 10 - unsigned
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');

            $table->string('name'); // varchar 255

            $table->longText('description')->nullable(); // text

            $table->string('image')->nullable(); // varchar 255

            $table->boolean('is_active')->default(true); // tinyint 2 - 0 or 1

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_models');
    }
};
