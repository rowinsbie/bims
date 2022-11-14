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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('birthdate');
            $table->string('gender');
            $table->string('contact_no');
            $table->string('email')->unique();
            $table->boolean('isPWD');
            $table->String('resident_number');
            $table->string('password');
            $table->timestamps();
        });

        DB::table('users')->insert([
            'first_name' => 'Seiki Rowins',
            'middle_name' => 'Limpin',
            'last_name' => 'Bie',
            'birthdate' => date('Y-m-d',strtotime('1997-02-25')),
            'gender' => 'Male',
            'contact_no' => '09077755144',
            'email' => 'seikirowins.bie.srb@gmail.com',
            'isPWD' => false,
            'resident_number' => 'rd-'.rand(0,9999),
            'password' => Hash::make('pass1234')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
