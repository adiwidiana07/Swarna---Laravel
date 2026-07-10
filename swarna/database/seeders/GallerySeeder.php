<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        if (Gallery::count() > 0) {
            return;
        }

        $availableImages = [
            'img/model 1.png',
            'img/baju kaos.png',
            'img/gantungan kunci.jpeg',
            'img/stiker.jpeg',
            'img/Totebag.jpg',
            'img/SWARNA.png',
            'img/SWARNA-logo no1.png',
            'img/swarna hero.png',
        ];

        $items = [
            ['title' => 'Desain Batik Modern', 'category' => 'Desain'],
            ['title' => 'Koleksi Tekstil', 'category' => 'Produksi'],
            ['title' => 'Interior Design', 'category' => 'Desain'],
            ['title' => 'Fashion Line', 'category' => 'Produksi'],
            ['title' => 'Art Installation', 'category' => 'Seni'],
            ['title' => 'Branding Project', 'category' => 'Desain'],
            ['title' => 'Custom Crafts', 'category' => 'Produksi'],
            ['title' => 'Furniture Design', 'category' => 'Desain'],
            ['title' => 'Textile Collection', 'category' => 'Produksi'],
        ];

        foreach ($items as $i => $item) {
            Gallery::create([
                'title' => $item['title'],
                'image' => $availableImages[$i % count($availableImages)],
                'category' => $item['category'],
            ]);
        }
    }
}
