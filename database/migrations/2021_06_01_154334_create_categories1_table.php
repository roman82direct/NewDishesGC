<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategories1Table extends Migration
{
    /**
     * Run the migrations.
     * Товарные категории первого уровня
     * @return void
     */
    public function up()
    {
        Schema::create('categories1', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->unique();
            $table->string('img')->default('empty')->comment('Path to the main img of the category');
            $table->string('img1')->default('empty');
            $table->string('img2')->default('empty');
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
        Schema::dropIfExists('categories1');
    }
}
