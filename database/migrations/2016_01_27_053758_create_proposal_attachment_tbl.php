<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalAttachmentTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proposal_attachment', function (Blueprint $table) {
            $table->increments('proposal_attachment_id');
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
        Schema::drop('proposal_attachment');
    }
}
