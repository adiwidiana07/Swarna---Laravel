<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman edit konten Home.
     */
    public function index()
    {
        $home = HomeContent::getInstance();

        return view('admin.home', compact('home'));
    }

    /**
     * Simpan perubahan konten Home ke database.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            // Hero
            'hero_eyebrow'   => 'required|string|max:255',
            'hero_title'     => 'required|string|max:255',
            'hero_subtitle'  => 'required|string|max:255',
            'hero_btn1_text' => 'required|string|max:255',
            'hero_btn2_text' => 'required|string|max:255',
            'hero_bg_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // About
            'about_label'         => 'required|string|max:255',
            'about_title'         => 'required|string|max:255',
            'about_description'   => 'nullable|string',
            // Brand Logos
            'brand_logo1_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'brand_logo1_name'    => 'required|string|max:100',
            'brand_logo2_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'brand_logo2_name'    => 'required|string|max:100',
            'brand_logo3_image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'brand_logo3_name'    => 'required|string|max:100',
            // About History
            'about_history_label' => 'required|string|max:255',
            'about_history_title' => 'required|string|max:255',
            'about_history_text1' => 'nullable|string',
            'about_history_text2' => 'nullable|string',
            'about_image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            // CTA
            'cta_label'     => 'required|string|max:255',
            'cta_title'     => 'required|string|max:255',
            'cta_tagline'   => 'nullable|string',
            'cta_wa_number' => 'required|string|max:50',
            'cta_email'     => 'required|email|max:255',
        ]);

        $home = HomeContent::getInstance();
        $data = $validated;

        // Handle Hero Background Image Upload
        if ($request->hasFile('hero_bg_image')) {
            if ($home->hero_bg_image && Storage::disk('public')->exists($home->hero_bg_image)) {
                Storage::disk('public')->delete($home->hero_bg_image);
            }
            $data['hero_bg_image'] = $request->file('hero_bg_image')->store('home', 'public');
        } else {
            // Keep existing image if not uploading a new one
            unset($data['hero_bg_image']);
        }

        // Handle Brand Logo Image Uploads
        foreach ([1, 2, 3] as $i) {
            $field = "brand_logo{$i}_image";
            if ($request->hasFile($field)) {
                $existing = $home->$field;
                if ($existing && Storage::disk('public')->exists($existing)) {
                    Storage::disk('public')->delete($existing);
                }
                $data[$field] = $request->file($field)->store('home', 'public');
            } else {
                unset($data[$field]);
            }
        }

        // Handle About History Image Upload
        if ($request->hasFile('about_image')) {
            if ($home->about_image && Storage::disk('public')->exists($home->about_image)) {
                Storage::disk('public')->delete($home->about_image);
            }
            $data['about_image'] = $request->file('about_image')->store('home', 'public');
        } else {
            // Keep existing image if not uploading a new one
            unset($data['about_image']);
        }

        $home->update($data);

        return redirect()->route('admin.home')
            ->with('success', 'Konten halaman Home berhasil diperbarui!');
    }
}
