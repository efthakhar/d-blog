<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');

            $table->string('meta_keywords');
            $table->string('meta_description');

            $table->timestamp('date');
            $table->bigInteger('author');
            $table->string('post_thumbnail_url');


            $table->longText('content');
            $table->text('excerpt');

            
            $table->boolean('featured');
            $table->boolean('breaking');
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
