<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->bigInteger('cat_id');
            $table->bigInteger('post_id');
            $table->unique(['cat_id','post_id']);
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('category_post');
    }
};
