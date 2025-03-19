<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
{
    Schema::create('categories', function (Blueprint $table) {
        $table->id('id_category'); // Kolom primary key yang sesuai
        $table->string('category_name');
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
}



