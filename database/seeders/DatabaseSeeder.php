<?php

namespace Database\Seeders;

use App\Models\banner;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Mochammad Ikhsan Nawawi',
            'email' => 'moderator@ikhsannawawi.id',
            'password' => bcrypt('sanbray'),
            'foto' => 'user.jpg',
            'remember_token' => Str::random(60),
        ]);
        
        
        
        
        
        banner::create([
            'title_banner' => 'Hallo! Saya Mochammad Ikhsan Nawawi',
            'body_banner' => 'Creative <span>UI/UX</span> Designer &amp; Web Developer',
            'foto' => 'default-2.jpg',
        ]);
        banner::create([
            'title_banner' => 'We Design &amp; Build Brands',
            'body_banner' => 'Hi, Saya <span>Ikhsan</span> Ini Portfolio Saya.',
            'foto' => 'default-1.jpg',
        ]);
    }
}
