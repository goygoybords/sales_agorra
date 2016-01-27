<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        //master list for clients
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('client_id');
            $table->string('company_name')->unique();
            $table->string('company_address');
            $table->string('contact_person');
            $table->string('contact_number', 15);
            $table->string('email');
            $table->decimal('credit_limit', 8, 2);
            $table->decimal('balance', 8, 2);
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
        Schema::drop('clients');
    }
}
