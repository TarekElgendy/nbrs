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
        Schema::create('productitem_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('seo_key')->nullable();
            $table->text('seo_des')->nullable();

            $table->integer('productitem_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['productitem_id', 'locale']);
            $table->foreign('productitem_id')->references('id')->on('productitems')->onDelete('cascade');
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
        Schema::dropIfExists('productitem_translations');
    }
};
