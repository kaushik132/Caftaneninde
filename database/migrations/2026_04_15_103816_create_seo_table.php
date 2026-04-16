<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('seo_title_home')->nullable();
            $table->text('seo_des_home')->nullable();
            $table->text('seo_key_home')->nullable();
            $table->string('seo_title_product')->nullable();
            $table->text('seo_des_product')->nullable();
            $table->text('seo_key_product')->nullable();
            $table->string('seo_title_blog')->nullable();
            $table->text('seo_des_blog')->nullable();
            $table->text('seo_key_blog')->nullable();
            $table->string('seo_title_contact')->nullable();
            $table->text('seo_des_contact')->nullable();
            $table->text('seo_key_contact')->nullable();
            $table->string('seo_title_wishlist')->nullable();
            $table->text('seo_des_wishlist')->nullable();
            $table->text('seo_key_wishlist')->nullable();
            $table->string('seo_title_account')->nullable();
            $table->text('seo_des_account')->nullable();
            $table->text('seo_key_account')->nullable();
            $table->string('seo_title_cart')->nullable();
            $table->text('seo_des_cart')->nullable();
            $table->text('seo_key_cart')->nullable();
            $table->string('seo_title_privacy')->nullable();
            $table->text('seo_des_privacy')->nullable();
            $table->text('seo_key_privacy')->nullable();
            $table->string('seo_title_terms')->nullable();
            $table->text('seo_des_terms')->nullable();
            $table->text('seo_key_terms')->nullable();
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
        Schema::dropIfExists('seo');
    }
}
