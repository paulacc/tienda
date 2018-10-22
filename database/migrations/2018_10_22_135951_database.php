<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('products', function (Blueprint $table) {
         $table->smallIncrements('id');
         $table->float('price', 6, 2);
         $table->string('name');
         //$table->text('description')->nullable();
         $table->softdeletes();
         $table->timestamps();

         $table->tinyInteger('category_id')->unsigned()->index();
     });

     Schema::create('categories', function (Blueprint $table) {
         $table->tinyIncrements('id');
         $table->string('name');
         $table->softdeletes();
         $table->timestamps();
     });

     Schema::create('tags', function (Blueprint $table) {
         $table->tinyIncrements('id');
         $table->string('name');
         $table->softdeletes();
         $table->timestamps();
     });

     Schema::create('images', function (Blueprint $table) {
         $table->mediumIncrements('id');
         $table->string('src');

         $table->smallInteger('product_id')->unsigned()->index();
     });

     Schema::create('product_tag', function (Blueprint $table) {
         $table->increments('id');
         $table->smallInteger('product_id')->unsigned()->index();
         $table->tinyInteger('tag_id')->unsigned()->index();
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
      Schema::dropIfExists('categories');
      Schema::dropIfExists('tags');
      Schema::dropIfExists('images');
      Schema::dropIfExists('product_tag');
    }
}
