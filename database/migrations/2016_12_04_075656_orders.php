<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('Идентификатор пользователя');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('client_id')->unsigned()->comment('Идентификатор клиента');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('master_id')->unsigned()->comment('Идентификатор клиента');
            $table->foreign('master_id')->references('id')->on('users');
            $table->dateTime('date_priem')->comment('Дата приема в работу');
            $table->dateTime('date_end')->comment('Дата здачи работы');
            $table->string('price', 1000)->comment('Цена за работу');
            $table->string('materials_id', 1000)->comment('Списак материало необходимы для выполнения работы');
            $table->string('autos_id', 1000)->comment('Список предметов интерьера');
            $table->string('work_dops_id', 1000)->comment('Доп опции к заказу');
            $table->text('comment')->nullable()->comment('Комментарий к заказу');
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
        Schema::dropIfExists('orders');
    }
}
