<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'message' => 'required|string|max:1000',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        // Testimoni baru selalu belum disetujui,
        // menunggu admin review lewat panel admin
        $validated['is_approved'] = false;

        Testimonial::create($validated);

        return back()->with(
            'testimony_success',
            'Terima kasih! Testimoni Anda akan tampil setelah disetujui.'
        );
    }
}