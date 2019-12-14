<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDasherDeliveriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('dasher_deliveries', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('dasher_id');
      $table->foreign('dasher_id')->references('id')->on('dashers');
      $table->integer('order_num');
      $table->decimal('delivery_charge', 10, 2);
      $table->decimal('service_charge', 10, 2);
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
    Schema::dropIfExists('dasher_deliveries');
  }
}
