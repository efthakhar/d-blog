<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            
            $table->bigInteger('post_id');
            $table->bigInteger('tag_id');

            $table->unique(['post_id','tag_id']);

        });
    }

 
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
};
