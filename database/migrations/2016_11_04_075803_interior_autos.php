<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InteriorAutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interior_autos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Названия категории или интерьера автомобиля');
            $table->integer('sid')->unsigned()->comment('Категория интерьера автомобиля');
            $table->integer('price')->nullable()->unsigned()->comment('Цена за работу');
            $table->string('type')->comment('Тип элемента');
            $table->text('comment')->nullable()->comment('Комментарий к авто');
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
        Schema::dropIfExists('interior_autos');
    }
}
