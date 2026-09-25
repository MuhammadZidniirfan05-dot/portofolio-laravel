<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\SocialLink;
use App\Models\Post;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\HeroSlide;

class HomeController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::orderBy('order')->get();
        $projects = Project::orderBy('order')->get();

        // 🔧 DIUBAH: group by category biar bisa dirender 3 kolom
        $skills = Skill::orderBy('order')->get()->groupBy('category');

        // 🔧 BARU: daftar kategori + icon-nya (FontAwesome)
        $skillCategories = [
            'Core Technologies'      => 'fa-code',
            'Frameworks & Libraries' => 'fa-cubes',
            'Database & IT Services' => 'fa-database',
        ];

        $experiences = Experience::orderBy('order')->get();
        $socialLinks = SocialLink::where('is_active', true)->orderBy('order')->get();
        $services = Service::orderBy('order')->get();

        $testimonials = Testimonial::where('is_approved', true)
            ->latest()
            ->get();

        $posts = Post::where('is_published', true)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        $earliestExperience = Experience::orderBy('start_date')->first();
        $yearsExperience = $earliestExperience
            ? abs(now()->diffInYears($earliestExperience->start_date))
            : 0;

        // 🔧 DIUBAH: tambah 'skillCategories' ke compact
        return view('home', compact(
            'heroSlides',
            'projects',
            'skills',
            'skillCategories',
            'experiences',
            'socialLinks',
            'services',
            'testimonials',
            'posts',
            'yearsExperience'
        ));
    }
}