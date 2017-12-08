<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorkDops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_dops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Названия доп услуги');
            $table->integer('price')->nullable()->unsigned()->comment('Цена за доп услугу');
            $table->integer('sid')->unsigned()->comment('Категория доп услуги');
            $table->string('type')->comment('Тип доп услуги');
            $table->text('comment')->nullable()->comment('Коммерарий к доп услуги');
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
        Schema::dropIfExists('work_dops');
    }
}
