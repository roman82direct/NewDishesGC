<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgsColumnsToGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->string('img')->nullable()->change();
            $table->string('img1')->nullable()->change();
            $table->string('img2')->nullable()->change();
            $table->string('img3')->nullable()->after('img2');
            $table->string('img4')->nullable()->after('img3');
            $table->string('img_pack')->nullable()->after('img4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->string('img')->default('empty')->change();
            $table->string('img1')->default('empty')->change();
            $table->string('img2')->default('empty')->change();
            $table->dropColumn('img3');
            $table->dropColumn('img4');
            $table->dropColumn('img_pack');
        });
    }
}
