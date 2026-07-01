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
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_eyebrow')->default('Bali · Indonesia');
            $table->string('hero_title')->default('SWARNA');
            $table->string('hero_subtitle')->default('Production');
            $table->string('hero_btn1_text')->default('Kenali Swarna');
            $table->string('hero_btn2_text')->default('Divisi Swarna');

            // About Section
            $table->string('about_label')->default('Tentang Kami');
            $table->string('about_title')->default('Warisan Budaya, Estetika Modern');
            $table->text('about_description')->nullable();
            $table->string('about_history_label')->default('Sejarah');
            $table->string('about_history_title')->default('Perjalanan SWARNA');
            $table->text('about_history_text1')->nullable();
            $table->text('about_history_text2')->nullable();

            // CTA Section
            $table->string('cta_label')->default('Mulai Bersama Kami');
            $table->string('cta_title')->default('Wujudkan Visimu');
            $table->text('cta_tagline')->nullable();
            $table->string('cta_wa_number')->default('628xxxxxxxxxx');
            $table->string('cta_email')->default('hello@swarna.id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};
