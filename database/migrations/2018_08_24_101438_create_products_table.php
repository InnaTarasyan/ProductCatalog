<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // таблица для товаров
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); // айди товара
            $table->string('title', 100); // название товара
            $table->string('image'); // ссылка на изображение
            $table->text('description');// описание товара
            $table->date('first_invoice')->nullable();// дата первой продажи товара
            $table->string('url');// ссылка на товар на markethot.ru
            $table->integer('price');//  минимальная цена товара
            $table->integer('amount');// количество всех вариаций
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
        Schema::dropIfExists('products');
    }
}
