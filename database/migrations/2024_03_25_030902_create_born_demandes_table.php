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
        Schema::create('born_demandes', function (Blueprint $table) {
            $table->id();
            $table->string('employe_name');
            $table->string('work_type');
            $table->string('rental_number');
            $table->date('born_date');
            $table->string('born_duree');
            $table->date('born_start');
            $table->date('born_back');
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
        Schema::dropIfExists('born_demandes');
    }
};
