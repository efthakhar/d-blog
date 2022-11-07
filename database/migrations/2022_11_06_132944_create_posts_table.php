<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        
        Schema::create('posts', function (Blueprint $table) {

            $table->id();
            $table->string('title')->unique();
            $table->string('slug')->unique();

            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();

            $table->timestamp('date')->nullable();
            $table->bigInteger('author_id')->nullable();
            $table->string('post_thumbnail_url')->nullable();

            $table->longText('content')->nullable();
            $table->text('excerpt')->nullable();
   
            $table->boolean('featured')->nullable();
            $table->boolean('breaking')->nullable();
            
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
