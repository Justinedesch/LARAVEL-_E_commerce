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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name');
            $table->longText('description');
            $table->float('price', 10, 0)->nullable();
            $table->float('weight', 10, 0)->nullable();
            $table->string('image')->nullable();
            $table->smallInteger('quantity')->nullable();
            $table->boolean('available')->nullable();
            $table->integer('categorie_id')->nullable()->index('id_categories');
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
};
