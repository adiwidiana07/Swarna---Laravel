<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeContent;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        HomeContent::updateOrCreate(
            ['id' => 1],
            [
                // Hero
                'hero_eyebrow'  => 'Bali · Indonesia',
                'hero_title'    => 'SWARNA',
                'hero_subtitle' => 'Production',
                'hero_btn1_text' => 'Kenali Swarna',
                'hero_btn2_text' => 'Divisi Swarna',

                // About
                'about_label'         => 'Tentang Kami',
                'about_title'         => 'Warisan Budaya, Estetika Modern',
                'about_description'   => 'SWARNA adalah studio kreatif yang menghadirkan perpaduan antara budaya Bali dan desain modern. Melalui berbagai karya di bidang apparel, desain visual, dan dekorasi, kami berupaya menciptakan produk yang memiliki identitas, nilai estetika, dan karakter yang kuat.',
                'about_history_label' => 'Sejarah',
                'about_history_title' => 'Perjalanan SWARNA',
                'about_history_text1' => 'Berawal dari ketertarikan terhadap seni, budaya, dan desain, SWARNA tumbuh menjadi ruang kreatif yang berfokus pada pengembangan karya visual dan produk kreatif. Setiap proyek yang dikerjakan berangkat dari perhatian terhadap detail serta keinginan untuk menghasilkan karya yang memiliki nilai dan makna.',
                'about_history_text2' => 'Hingga saat ini, SWARNA terus berkembang dengan menghadirkan berbagai karya yang memadukan unsur tradisional dan pendekatan modern, sehingga tetap relevan tanpa kehilangan identitas budayanya.',

                // CTA
                'cta_label'   => 'Mulai Bersama Kami',
                'cta_title'   => 'Wujudkan Visimu',
                'cta_tagline' => 'Kami siap membantu mewujudkan ide kreatifmu — dari pakaian hingga kolaborasi jangka panjang.',
                'cta_wa_number' => '628xxxxxxxxxx',
                'cta_email'   => 'hello@swarna.id',
            ]
        );
    }
}
