<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = [
            'profile' => [
                'name' => 'Dian Gita Meilani',
                'title' => 'Fullstack Engineer',
                'location' => 'Sleman, DIY',
                'phone' => '+62 896 7436 6444',
                'email' => 'dgtmeila.a@gmail.com',
                'bio' => 'Saya merupakan mahasiswa S1 aktif semester 4 pada Program Studi Teknologi Informasi, Fakultas Sains dan Teknologi, Universitas \'Aisyiyah Yogyakarta. Saya memiliki ketertarikan yang tinggi di bidang teknologi informasi, khususnya dalam pengembangan perangkat lunak berbasis web. Dengan pemahaman pada pengembangan front-end maupun back-end, saya berkomitmen untuk terus meningkatkan keterampilan teknis serta mengikuti perkembangan teknologi terkini.'
            ],
            'education' => [
                'university' => 'Universitas Aisyah Yogyakarta',
                'major' => 'Teknologi Informasi',
                'gpa' => '3.90/4.00',
                'period' => 'Agustus 2023 - Sekarang',
                'relevant_courses' => [
                    'Struktur Data dan Algoritma',
                    'Pemrograman Full Stack',
                    'Integrasi Sistem',
                    'Administrasi Sistem'
                ]
            ],
            'projects' => [
                [
                    'title' => 'Portofolio Pribadi dengan React',
                    'description' => 'Mengembangkan website portofolio menggunakan React.js dan berhasil meraih nilai 100 dalam penilaian proyek mata kuliah.',
                    'tech_stack' => ['React.js', 'JavaScript', 'CSS']
                ],
                [
                    'title' => 'Website E-Commerce dengan Laravel 11',
                    'description' => 'Membangun aplikasi e-commerce berbasis Laravel 11 dengan fitur CRUD produk, manajemen pengguna, dan integrasi database MySQL.',
                    'tech_stack' => ['Laravel 11', 'PHP', 'MySQL', 'Bootstrap']
                ],
                [
                    'title' => 'Aplikasi Rekam Medis Multiuser',
                    'description' => 'Merancang dan mengembangkan sistem rekam medis yang mendukung akses multiuser dengan otorisasi peran (role-based access).',
                    'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'OAuth']
                ],
                [
                    'title' => 'Website Medical Tourism "JogjaCare"',
                    'description' => 'Proyek kolaboratif lintas mata kuliah untuk mengembangkan platform informasi layanan wisata medis di Yogyakarta.',
                    'tech_stack' => ['Laravel', 'PHP', 'MySQL', 'JavaScript']
                ]
            ],
            'skills' => [
                'frontend' => [
                    'HTML, CSS, JavaScript',
                    'React.js',
                    'Tailwind CSS, Bootstrap',
                    'Responsive Design'
                ],
                'backend' => [
                    'PHP (Laravel)',
                    'Python',
                    'MySQL',
                    'RESTful API / GraphQL',
                    'OAuth'
                ],
                'devops' => [
                    'Git & GitHub',
                    'GitHub Actions',
                    'Node.js',
                    'Google Cloud Platform',
                    'Deployment Hosting VPS',
                    'Deployment Vercel'
                ]
            ],
            'achievements' => [
                'Peserta Lomba Internasional Proxocoris dalam Pembuatan Aplikasi berbasis website yang ditunjuk langsung oleh kampus sebagai perwakilan.',
                'Ikut serta dalam ajang kewirausahaan dalam pembuatan website desa berbasis Laravel.'
            ],
            'organization' => [
                'name' => 'Itech (Information Technology)',
                'role' => 'Anggota Aktif',
                'description' => 'Anggota aktif dalam organisasi kemahasiswaan yang bergerak di bidang teknologi informasi. Berpartisipasi dalam kegiatan pelatihan, seminar, dan pengembangan proyek teknologi bersama mahasiswa lain.'
            ]
        ];

        return view('portfolio.index', compact('data'));
    }
}
