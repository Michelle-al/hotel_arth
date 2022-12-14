<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_medias')->insert([
            [
                'logo_url' => "storage/social_medias/logo-instagram.png",
                'social_url' => "https://www.instagram.com",
                "logo_alt" => "Instagram logo"
            ],
            [
                'logo_url' => "storage/social_medias/logo-facebook.png",
                'social_url' => "https://fr-fr.facebook.com/",
                "logo_alt" => "Facebook logo"
            ],
            [
                'logo_url' => "storage/social_medias/logo-twitter.png",
                'social_url' => "https://twitter.com/",
                "logo_alt" => "Twitter logo"
            ],

        ]);
    }
}
