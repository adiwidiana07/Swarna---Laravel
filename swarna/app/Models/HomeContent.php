<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        // Hero
        'hero_eyebrow',
        'hero_title',
        'hero_subtitle',
        'hero_btn1_text',
        'hero_btn2_text',
        'hero_bg_image',
        // About
        'about_label',
        'about_title',
        'about_description',
        // Brand Logos
        'brand_logo1_image',
        'brand_logo1_name',
        'brand_logo2_image',
        'brand_logo2_name',
        'brand_logo3_image',
        'brand_logo3_name',
        // About History
        'about_history_label',
        'about_history_title',
        'about_history_text1',
        'about_history_text2',
        'about_image',
        // CTA
        'cta_label',
        'cta_title',
        'cta_tagline',
        'cta_wa_number',
        'cta_email',
    ];

    /**
     * Ambil konten Home (singleton – selalu row pertama, buat jika belum ada).
     */
    public static function getInstance(): static
    {
        return static::firstOrCreate(['id' => 1]);
    }
}
