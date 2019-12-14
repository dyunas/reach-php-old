<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('merchants', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('merchant_name', 30);
      $table->text('location');
      $table->bigInteger('phone_num');
      $table->string('status', 30);
      $table->string('store_hours', 30);
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
    Schema::dropIfExists('merchants');
  }
}
