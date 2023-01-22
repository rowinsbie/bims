<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    private $disabilitiesList = [
        'Psychosocial disability',
        'Visual disability',
        'Orthopedic disability',
        'Disability as a result of a chronic illness',
        'Learning disability',
        'Mental disability',
        'Multiple disabilities',
        'Hearing impairment',
        'Speech disabilities'
    ];

    private $data = [];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disabilities', function (Blueprint $table) {
            $table->id();
            $table->string('disabilityDesc');
            $table->timestamps();
        });
        
        foreach($this->disabilitiesList as $disability) {
            $this->data[] = ['disabilityDesc' => $disability];
        }

        if(!empty($this->data)) {
            DB::table('disabilities')->insert($this->data);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disabilities');
    }
};
