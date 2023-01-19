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
            $table->unsignedBigInteger('resident_id');
            $table->string('region_id');
            $table->string('province_id');
            $table->string('municipal_id');
            $table->string('barangay_id');
            $table->string('Address');
            $table->timestamps();
        });

        Schema::create('resident_addresses',function(Blueprint $table) {
            $table->foreign('resident_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('region_id')
            ->references('regCode')
            ->on('refregion')
            ->onDelete('cascade');

            $table->foreign('province_id')
            ->references('provCode')
            ->on('refprovince')
            ->onDelete('cascade');

            $table->foreign('municipal_id')
            ->references('citymunCode')
            ->on('refcitymun')
            ->onDelete('cascade');

            $table->foreign('barangay_id')
            ->references('brgyCode')
            ->on('refbrgy')
            ->onDelete('cascade');

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
