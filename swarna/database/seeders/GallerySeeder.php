<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Don't duplicate if already seeded
        if (Gallery::count() > 0) {
            return;
        }

        $items = [
            ['title' => 'Desain Batik Modern', 'image' => 'img/gallery/1.jpg', 'category' => 'Desain'],
            ['title' => 'Koleksi Tekstil', 'image' => 'img/gallery/2.jpg', 'category' => 'Produksi'],
            ['title' => 'Interior Design', 'image' => 'img/gallery/3.jpg', 'category' => 'Desain'],
            ['title' => 'Fashion Line', 'image' => 'img/gallery/4.jpg', 'category' => 'Produksi'],
            ['title' => 'Art Installation', 'image' => 'img/gallery/5.jpg', 'category' => 'Seni'],
            ['title' => 'Branding Project', 'image' => 'img/gallery/6.jpg', 'category' => 'Desain'],
            ['title' => 'Custom Crafts', 'image' => 'img/gallery/7.jpg', 'category' => 'Produksi'],
            ['title' => 'Furniture Design', 'image' => 'img/gallery/8.jpg', 'category' => 'Desain'],
            ['title' => 'Textile Collection', 'image' => 'img/gallery/9.jpg', 'category' => 'Produksi'],
        ];

        foreach ($items as $item) {
            Gallery::create($item);
        }
    }
}
