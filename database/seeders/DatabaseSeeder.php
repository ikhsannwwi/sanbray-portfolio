<?php

namespace Database\Seeders;

use App\Models\banner;
use App\Models\category_project;
use App\Models\gallery_project;
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
        
        
        
        category_project::create([
            'category_project' => 'Web Developer',
        ]);

        gallery_project::create([
            'nama_project' => 'Sanbray Company',
            'deskripsi' => 'Website ini dibuat untuk memudahkan Saya mengisi data penjualan',
            'url' => 'http://sanbray.epizy.com',
            'category_project_id' => '1',
            'foto' => '8nZ0yfqG.png',
        ]);
        gallery_project::create([
            'nama_project' => 'IkhsanNawawi Portfolio',
            'deskripsi' => 'Sebuah website portfolio adalah sebuah situs web yang dibuat untuk menampilkan karya dan pencapaian seseorang dalam bidang tertentu, seperti desain grafis, fotografi, atau pengembangan web. Website ini biasanya digunakan oleh freelancer atau profesional untuk mempromosikan diri mereka secara online dan menunjukkan kepada calon klien atau perekrut potensial tentang kemampuan mereka. <br> Website portfolio biasanya memiliki tampilan yang profesional dan rapi, dengan navigasi yang mudah dipahami dan fitur-fitur seperti galeri gambar, keterangan proyek, deskripsi jasa, dan informasi kontak. Desain dan tata letaknya didesain untuk menarik perhatian pengunjung dan memudahkan mereka untuk menjelajahi karya-karya yang telah dibuat. <br> Salah satu tujuan utama dari website portfolio adalah untuk menunjukkan kemampuan dan kualitas pekerjaan yang telah dilakukan. Oleh karena itu, portfolio biasanya dilengkapi dengan karya-karya terbaik yang pernah dihasilkan dan juga referensi dari klien atau kolega sebelumnya. <br> Sebuah website portfolio juga dapat dijadikan sebagai alat untuk membangun merek pribadi atau branding. Dalam hal ini, desain, warna, dan gaya visual pada website portfolio harus konsisten dengan merek yang ingin dibangun. <br> Dalam keseluruhan, website portfolio merupakan alat yang sangat penting bagi profesional untuk menampilkan karyanya, mempromosikan diri, dan membangun merek pribadi. Hal ini sangat berguna untuk mendapatkan pekerjaan atau proyek baru, sehingga menjadi sebuah aset penting bagi para freelancer dan profesional.',
            'url' => 'http://ikhsannawawi.epizy.com',
            'category_project_id' => '1',
            'foto' => 'stVnOd0y.png',
        ]);
    }
}
