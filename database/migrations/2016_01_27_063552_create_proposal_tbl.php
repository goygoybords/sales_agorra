<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proposals', function (Blueprint $table) {
            $table->increments('proposal_id');
            $table->string('project_name');
            $table->date('proposal_date');
            $table->integer('salesperson')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->decimal('total', 8, 2)->unsigned();
            $table->binary('file');
            $table->boolean('status');
            $table->foreign('salesperson')->references('id')->on('users');
            $table->foreign('client_id')->references('client_id')->on('clients');

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
        Schema::drop('proposals');
    }
}
