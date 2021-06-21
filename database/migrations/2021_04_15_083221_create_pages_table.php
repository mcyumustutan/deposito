<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id'); 
            $table->string('title', 250);
            $table->string('slug', 250);
            $table->longText('content');
            $table->char('type', 100);
            $table->char('lang', 100);
            $table->char('description', 250);
            $table->char('keywords', 250); 
            $table->integer('ordinal');
            $table->json('components');
            $table->json('albums');
            $table->json('on_menu');
            $table->char('external_link', 250);
            $table->char('special_value', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
