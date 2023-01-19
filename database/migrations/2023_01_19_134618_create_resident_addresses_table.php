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
        Schema::create('resident_addresses', function (Blueprint $table) {
            $table->id();
            $table->engine = "innoDB";
            $table->unsignedBigInteger('resident_id');
            $table->string('region_id');
            $table->string('province_id');
            $table->string('municipal_id');
            $table->string('barangay_id');
            $table->foreign('resident_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->string('Address');
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
        Schema::dropIfExists('resident_addresses');
    }
};
