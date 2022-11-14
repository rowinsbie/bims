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
        Schema::create('resident_vitals', function (Blueprint $table) {
            $table->id();
            $table->string('vitals')->comment('Alive or Deceased');
            $table->timestamps();
        });

        DB::table('resident_vitals')->insert([
          [
            'vitals' => 'Alive'
          ],
          [
            'vitals' => 'Deceased'
          ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resident_vitals');
    }
};
