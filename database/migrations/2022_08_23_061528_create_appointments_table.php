<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')
                ->references('id')
                ->on('owners')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('pet_id');
            $table->foreign('pet_id')
                ->references('id')
                ->on('pets')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('reason_id');
            $table->foreign('reason_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade');
            $table->date('date');
            $table->string('time');
            $table->string('complaint')->nullable();
            $table->string('weight')->nullable();
            $table->string('hr')->nullable();
            $table->string('rr')->nullable();
            $table->string('temperature')->nullable();
            $table->string('diet')->nullable();
            $table->string('next_visit')->nullable();

            $table->string('history')->nullable();
            $table->string('prescription')->nullable();
            $table->string('comment')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors')
                ->onUpdate('cascade');

            $table->string('image_name')->nullable();
            $table->string('path')->nullable();
            $table->text('status')->default("request");
            $table->text('cancelled_by')->nullable();
            $table->string('type')->default('new client');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
