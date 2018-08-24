<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // вариации товарам
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id'); // айди вариации
            $table->integer('price'); // цена вариации
            $table->integer('amount'); // количество вариации товара на складе
            $table->integer('sales')->nullable(); //  единиц продано
            $table->string('article')->nullable(); // артикул вариации
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
        Schema::dropIfExists('offers');
    }
}
