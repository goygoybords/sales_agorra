<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('sales_id');
            $table->date('sales_date');
            $table->integer('proposal_id')->unsigned();
            $table->integer('sale_attachment_id')->unsigned();
            $table->string('terms', 60);
            $table->boolean('isVatable');
            $table->boolean('isCommisionable');
            $table->decimal('total', 8, 2);
            $table->boolean('status');

            $table->foreign('proposal_id')->references('proposal_id')->on('proposals');
            $table->foreign('sale_attachment_id')->references('sale_attachment_id')->on('sale_attachment');
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
        Schema::drop('sales');
    }
}
