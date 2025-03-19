<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
public function up()
{
    Schema::create('items', function (Blueprint $table) {
        $table->id('id_item');
        $table->string('item_name');
        $table->unsignedBigInteger('id_category'); // Foreign key
        $table->integer('stock');
        $table->timestamps();

        $table->foreign('id_category')
              ->references('id_category') // Pastikan sesuai kolom yang benar
              ->on('categories')
              ->onDelete('cascade');
    });
}

    public function down(): void
    {
        Schema::dropIfExists('items');
    }
}
