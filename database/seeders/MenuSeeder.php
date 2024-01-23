<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::factory(6)->create(['place_id' => 3]);

        Menu::factory(15)->create(['place_id' => 4]);


        Menu::create([
            'place_id' => 4,
            'image' => 'https://www.elmundoeats.com/wp-content/uploads/2022/04/RC-Easy-mee-goreng-in-a-wok.jpg',
            'name' => 'Mi goreng',
            'description' => 'Panas-panas lagi, campur sayur sama ayam',
            'category' => 'Breakfast',
            'price' => '2.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Nasi goreng goreng',
            'image' => 'https://resepichenom.com/media/Nasi_Goreng_Kampung.jpg',
            'description' => 'Panas-panas lagi, campur sayur sama ayam',
            'category' => 'Breakfast',
            'price' => '2.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Karipap',
            'image' => 'https://resepichenom.com/media/karipap_kentang_web.jpg',
            'description' => 'Panas-panas lagi, campur sayur sama ayam',
            'category' => 'Breakfast',
            'price' => '0.50'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Ayam masak kari',
            'image' => 'https://i.ytimg.com/vi/loq8PQbUPLg/maxresdefault.jpg',
            'description' => 'Ayam kari',
            'category' => 'Lunch',
            'price' => '1.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Ayam masak butter',
            'image' => 'https://perjalananku.com/wp-content/uploads/2020/10/a.jpg',
            'description' => 'Ayam butter',
            'category' => 'Lunch',
            'price' => '1.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Ayam masak kurma',
            'image' => 'https://jombuatsendiri.com/images/jombuat/masak/lauk/ayam/resipi-ayam-masak-kurma.webp',
            'description' => 'Ayam kurma',
            'category' => 'Lunch',
            'price' => '1.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Ayam masak merah',
            'image' => 'https://1.bp.blogspot.com/-gPYbJP3iOuI/YHkwhz1yTPI/AAAAAAAABP0/g6_tApzxChkIYVhvTK2Z6Srn-RNE2dR-gCNcBGAsYHQ/s720/Resepi%2BAyam%2BMasak%2BMerah.jpg',
            'description' => 'Ayam kurma',
            'category' => 'Lunch',
            'price' => '1.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Kangkung goreng',
            'image' => 'https://img-global.cpcdn.com/recipes/ec3eba89d9f5effe/680x482cq70/kangkung-goreng-belacan-resipi-foto-utama.jpg',
            'description' => 'Kangkung goreng dengan belacan',
            'category' => 'Lunch',
            'price' => '0.70'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Sayur campur',
            'image' => 'https://i.ytimg.com/vi/YLkg_uaj1GI/maxresdefault.jpg',
            'description' => 'Kangkung goreng dengan belacan',
            'category' => 'Lunch',
            'price' => '0.70'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Labu masak lemak',
            'image' => 'https://img-global.cpcdn.com/recipes/9d2795efe3a07860/680x482cq70/masak-lemak-sayur-bayam-dengan-labu-resipi-foto-utama.jpg',
            'description' => 'Kangkung goreng dengan belacan',
            'category' => 'Lunch',
            'price' => '0.70'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Vico',
            'image' => 'https://uf.cari.com.my/forumx/mforum/portal/201601/26/095412zrt5rpkidtzlrsrf.jpg',
            'description' => 'Sejuk +0.50',
            'category' => 'Drink',
            'price' => '2.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Green Tea Sejuk',
            'image' => 'https://cdn1-production-images-kly.akamaized.net/6YHlnqwx_kfStdTAV9SxYh_H1Hc=/57x0:724x667/1200x1200/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3628134/original/074999800_1636516947-shutterstock_431091712.jpg',
            'description' => 'Sejuk +0.50',
            'category' => 'Drink',
            'price' => '2.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Tea Sejuk',
            'image' => 'https://images.deliveryhero.io/image/fd-my/Products/2637000.jpg?width=%s',
            'description' => 'Sejuk +0.50',
            'category' => 'Drink',
            'price' => '2.00'
        ]);

        Menu::create([
            'place_id' => 4,
            'name' => 'Horlicks',
            'image' => 'https://media-cdn.tripadvisor.com/media/photo-s/17/e5/76/24/horlicksais.jpg',
            'description' => 'Sejuk +0.50',
            'category' => 'Drink',
            'price' => '2.00'
        ]);
    }
}
