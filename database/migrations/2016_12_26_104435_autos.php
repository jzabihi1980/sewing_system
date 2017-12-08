<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Autos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mark')->commnet('Марка');
            $table->string('body')->commnet('Кузов');
            $table->string('year_of_issue')->commnet('Год выпуска');
            $table->string('scheme')->commnet('Схема');
            $table->string('having_curves')->commnet('Наличия лекала');
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
        Schema::dropIfExists('autos');
    }
}
