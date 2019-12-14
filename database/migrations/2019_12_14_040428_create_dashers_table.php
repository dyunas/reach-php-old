<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('dashers', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('fname', 30);
      $table->string('lname', 30);
      $table->string('mi', 2);
      $table->bigInteger('phone_num');
      $table->string('vehicle_rank', 30);
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
    Schema::dropIfExists('dashers');
  }
}
