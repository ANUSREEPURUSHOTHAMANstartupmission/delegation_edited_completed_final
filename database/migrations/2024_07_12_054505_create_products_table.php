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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('startup_id');
            $table->string('name');
            $table->text('pitch');
            $table->text('brief');
            $table->boolean('sector_verified');
            $table->string('type')->nullable();
            $table->json('sectors')->nullable();
            $table->json('technologies')->nullable();

            $table->foreign('startup_id')->references('id')->on('startups')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
