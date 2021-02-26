<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(!Schema::hasTable('products')) {
           Schema::create('products', function (Blueprint $table) {
               $table->id();
               $table->string('name');
               $table->integer('category_id');
               $table->string('code');
               $table->text('description')->nullable();
               $table->double('price')->default(0);
               $table->text('image')->nullable();
               $table->timestamps();
           });
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poducts');
    }
}
