<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('art', 10)->unique();
            $table->string('name', 255)->unique();
            $table->text('description');
            $table->text('category');
            $table->string('brand', 20);
            $table->string('collection', 100);
            $table->unsignedBigInteger('category_id');
            $table->string('img')->comment('Path to the main img of the good');
            $table->string('img1');
            $table->string('img2');
            $table->integer('likes')->nullable();
            $table->integer('dislikes')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
