<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Gallery::create([
            'place_id' => 5,
            'image' => 'https://www.ukm.my/kiy/wp-content/uploads/2016/07/IMG_20160616_151137.jpg',
            'title' => 'Inside cafe'
        ]);

        Gallery::create([
            'place_id' => 5,
            'image' => 'https://www.theborneopost.com/newsimages/2022/07/ums-food.jpg',
            'title' => 'Food'
        ]);

        Gallery::create([
            'place_id' => 5,
            'image' => 'https://www.ums.edu.my/v5/images/stories/berita_attach/Program_Jom_Sahur.jpg',
            'title' => 'Food'
        ]);

        // https://www.myboost.com.my/wp-content/uploads/2022/04/WhatsApp-Image-2022-03-24-at-10.34.03-AM-1024x768.jpeg
        Gallery::create([
            'place_id' => 5,
            'image' => 'https://www.myboost.com.my/wp-content/uploads/2022/04/WhatsApp-Image-2022-03-24-at-10.34.03-AM-1024x768.jpeg',
            'title' => 'Tapau'
        ]);

        // https://media-cdn.tripadvisor.com/media/photo-s/06/06/0b/62/cafe-bar-iaela.jpg
        Gallery::create([
            'place_id' => 5,
            'image' => 'https://media-cdn.tripadvisor.com/media/photo-s/06/06/0b/62/cafe-bar-iaela.jpg',
            'title' => 'Harga makanan'
        ]);

        // Gallery::create([
        //     'place_id' => 2,
        //     'image' => 'https://cdn-ggbpb.nitrocdn.com/qBjxzkgBqKpYSMlwZuSEntiDEYKBkmLh/assets/images/optimized/rev-47680f5/www.thesignboardmaker.com/wp-content/uploads/2020/10/neon-cafe-signage-kepong.jpg',
        //     'title' => 'Harga makanan'
        // ]);

        // // https://www.holidify.com/images/cmsuploads/compressed/nasilemak_20200113182103.jpg
        // Gallery::create([
        //     'place_id' => 2,
        //     'image' => 'https://www.holidify.com/images/cmsuploads/compressed/nasilemak_20200113182103.jpg',
        //     'title' => 'Harga makanan'
        // ]);
    }
}
