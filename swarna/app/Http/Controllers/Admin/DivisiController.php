<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DivisiController extends Controller
{
    /**
     * Display a listing of the divisions in the admin panel.
     */
    public function index()
    {
        $items = Divisi::all();
        return view('admin.divisi', compact('items'));
    }

    /**
     * Show the form for editing the specified division.
     */
    public function edit(Divisi $divisi)
    {
        return view('admin.divisi-edit', compact('divisi'));
    }

    /**
     * Update the specified division in storage.
     */
    public function update(Request $request, Divisi $divisi)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'tagline'     => 'required|string|max:255',
            'description' => 'required|string',
            'icon'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('image')) {
            // Delete old custom image if it exists in public disk
            if ($divisi->image && Storage::disk('public')->exists($divisi->image)) {
                Storage::disk('public')->delete($divisi->image);
            }
            $data['image'] = $request->file('image')->store('divisi', 'public');
        } else {
            // Keep the current image
            unset($data['image']);
        }

        $divisi->update($data);

        return redirect()->route('admin.divisi')
            ->with('success', 'Divisi ' . $divisi->name . ' berhasil diperbarui!');
    }
}
