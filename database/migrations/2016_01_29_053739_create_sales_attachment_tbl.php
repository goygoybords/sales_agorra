<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesAttachmentTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sale_attachment', function (Blueprint $table) {
            $table->increments('sale_attachment_id');
            $table->string('filename', 30);
            $table->string('filetype', 30);
            $table->binary('file');
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
    }
}
