<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Divisi::count() > 0) {
            return;
        }

        $items = [
            [
                'name' => 'Apparel',
                'slug' => 'apparel',
                'tagline' => 'Local Culture meets Modern Threads',
                'description' => 'Divisi Apparel kami berfokus pada pembuatan pakaian berkualitas tinggi dengan sentuhan seni dan budaya Bali. Dari kaos grafis eksklusif, jersey komunitas, hingga merchandise custom, kami memadukan teknik sablon premium, bordir presisi, dan bahan terbaik untuk menghasilkan produk sandang yang nyaman digunakan dan bangga dipakai.',
                'image' => null,
                'icon' => 'fa-tshirt',
            ],
            [
                'name' => 'Decor',
                'slug' => 'decor',
                'tagline' => 'Artistic Spaces and Handcrafted Elements',
                'description' => 'Divisi Decor menciptakan elemen estetis untuk mempercantik ruangan Anda. Kami merancang hiasan dinding, dekorasi meja, dan ornamen interior kustom dengan memadukan unsur tradisional Bali dan estetika modern. Setiap produk dibuat secara detail menggunakan material pilihan (kayu, logam, resin) oleh perajin lokal berpengalaman.',
                'image' => null,
                'icon' => 'fa-couch',
            ],
            [
                'name' => 'Design',
                'slug' => 'design',
                'tagline' => 'Visual Identities and Creative Solutions',
                'description' => 'Divisi Design adalah dapur visual kami yang menyediakan jasa branding, desain grafis, ilustrasi kustom, hingga arah kreatif (art direction) untuk brand Anda. Kami membantu menerjemahkan nilai-nilai lokal ke dalam identitas visual modern yang kuat, relevan, dan memikat audiens global.',
                'image' => null,
                'icon' => 'fa-drafting-compass',
            ],
        ];

        foreach ($items as $item) {
            Divisi::create($item);
        }
    }
}
