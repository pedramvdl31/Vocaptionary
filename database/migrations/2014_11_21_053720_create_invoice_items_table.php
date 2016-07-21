<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoiceItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('invoice_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('invoice_id',false)->nullable();
			$table->tinyInteger('type')->nullable();
			$table->unsignedInteger('inventory_item_id',false)->nullable();
			$table->unsignedInteger('billable_id',false)->nullable();
			$table->tinyInteger('quantity')->nullable();
			$table->decimal('pretax', 9,2)->nullable();
			$table->decimal('tax', 9,2)->nullable();
			$table->decimal('interest', 9,2)->nullable();
			$table->decimal('total', 9,2)->nullable();
			$table->integer('height',false,true)->nullable();
			$table->integer('length',false,true)->nullable();
			$table->unsignedInteger('item_id', false)->nullable();
			$table->tinyInteger('status');
			$table->dateTime('completed_on')->nullable();
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
		Schema::drop('invoice_items');
	}

}
