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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('startup_stage');
            $table->string('business_sector');
            $table->string('revenue_generated_current');
            $table->string('revenue_generated_previous');

            $table->string('current_fy');
            $table->string('previous_fy');

            $table->string('investment_raised');
            $table->text('why_participate');
            $table->string('willing_to_pay');

            $table->unsignedBigInteger('event_id')->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->unsignedBigInteger('startup_id')->nullable();
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
        Schema::dropIfExists('applications');
    }
};
