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
            $table->integer('salesperson');
            $table->integer('client_id');
            $table->integer('service_category_id');
            $table->decimal('amount', 8, 2);
            $table->dateTime('date_sent');
            $table->string('filename')->nullable();
            $table->boolean('status');
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
