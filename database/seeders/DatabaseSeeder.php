<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            HeroSeeder::class,
            PresentationVideoSeeder::class,
            PromotionalBannerSeeder::class,
            RoomCategorySeeder::class,
            AdvantageSeeder::class,
            CustomerSeeder::class,
            UserSeeder::class,
            ReviewSeeder::class,
            NewsSeeder::class,
            SocialMediaSeeder::class,
            FooterSeeder::class
        ]);
    }
}
