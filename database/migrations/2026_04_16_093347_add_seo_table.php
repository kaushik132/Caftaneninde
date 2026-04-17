<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('seo', function (Blueprint $table) {
            $table->string('seo_title_login')->nullable();
            $table->text('seo_des_login')->nullable();
            $table->text('seo_key_login')->nullable();
            $table->string('seo_title_register')->nullable();
            $table->text('seo_des_register')->nullable();
            $table->text('seo_key_register')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
