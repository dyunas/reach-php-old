<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('merchant_products', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('merchant_id');
      $table->foreign('merchant_id')->references('id')->on('merchants');
      $table->string('prod_name', 100);
      $table->decimal('prod_price', 10, 2);
      $table->text('description');
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
    Schema::dropIfExists('merchant_products');
  }
}
