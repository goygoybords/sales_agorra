<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('collection', function (Blueprint $table) 
         {
            $table->increments('collection_id');
            $table->integer('sales_id')->unsigned();
            $table->date('collection_date');
            $table->enum('collection_type', ['PP', 'FP']);
            $table->text('remarks')->nullable();
            $table->decimal('amount', 10, 2);
            $table->integer('collected_by')->unsigned();
            $table->boolean('status');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('sales_id')->references('sales_id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
