<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalDetailTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proposals_detail', function (Blueprint $table) {
            $table->increments('proposal_detail_id');
            $table->integer('proposal_id')->unsigned();
            $table->integer('service_category_id')->unsigned();
            //$table->decimal('amount', 8, 2);
            $table->boolean('status');

            $table->foreign('proposal_id')->references('proposal_id')->on('proposals');
            $table->foreign('service_category_id')->references('service_category_id')->on('service_category');
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
        Schema::drop('proposals_detail');
    }
}
