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
            $table->bigIncrements('id');
            $table->integer('id_room')->unsigned();
            $table->integer('id_category')->unsigned();
            $table->string('item_name');
            $table->string('item_image');
            $table->text('item_desc');
            $table->integer('item_stock');
            $table->string('item_unit');
            $table->enum('item_condition', ['bad', 'good']);
            $table->timestamps();

            $table->foreign('id_room')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
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
