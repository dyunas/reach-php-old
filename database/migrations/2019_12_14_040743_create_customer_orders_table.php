<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrdersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('customer_orders', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('customer_id');
      $table->foreign('customer_id')->references('id')->on('customers');
      $table->unsignedBigInteger('merchant_id');
      $table->foreign('merchant_id')->references('id')->on('merchants');
      $table->string('order_status', 30);
      $table->decimal('order_total_price', 10, 2);
      $table->dateTime('order_date');
      $table->text('location');
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
    Schema::dropIfExists('customer_orders');
  }
}
