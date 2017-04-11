<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('donation_id');
            $table->integer('payer_id');
            $table->integer('receiver_id');
            $table->integer('amount_paid');
            $table->integer('amount_received');
            $table->dateTime('payment_date');
            $table->enum('payment_status', ['pending', 'accepted'])->default('pending');
            $table->string('pop_picture');
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
        Schema::dropIfExists('donations');
    }
}
