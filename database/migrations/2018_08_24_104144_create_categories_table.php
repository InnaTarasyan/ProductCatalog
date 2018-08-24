<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // категории товара
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id'); // айди категории
            $table->string('title'); // название категории
            $table->string('alias')->unique(); // slug категории, можно использовать в качестве пути для ссылки на категорию
            $table->integer('parent')->nullable(); //  родительская категория (у категорий есть иерархия)
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
        Schema::dropIfExists('categories');
    }
}
