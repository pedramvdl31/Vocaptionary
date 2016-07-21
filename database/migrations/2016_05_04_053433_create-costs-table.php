<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function(Blueprint $table) {
         $table->increments('id');
         $table->integer('user_id',false,true)->nullable();
         $table->string('company_name')->nullable();
         $table->integer('month')->nullable();
         $table->decimal('value', 10,5)->nullable();
         $table->decimal('total', 10,5)->nullable();
         $table->tinyInteger('status')->default('1');
         $table->softDeletes();
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
        Schema::drop('costs');
    }
}
