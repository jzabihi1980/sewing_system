<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TypeMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Наименования материалов для пошива/Категории');
            $table->integer('sid')->unsigned()->comment('Категория материала');
            $table->text('comment')->nullable()->comment('Комментарий к мотериалу');
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
        Schema::dropIfExists('type_materials');
    }
}
