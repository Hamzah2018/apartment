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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('size');
            $table->string('apartment_type');
            $table->integer('rooms_number');
            $table->string('bathroms_number');
            $table->text('apartment_description');
            $table->date('start_at');
            $table->date('end_at')->nullable();
            $table->string('rent_cyclic');
            $table->decimal('price_of_rent')->nullable();
            $table->decimal('total_price_according_to_cyclic')->nullable();
            $table->integer('number_presenter_payment')->nullable();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('apartments');
    }
};
