<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();
        return view('backend.about.edit', compact('about'));
    }

    // Update a About
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'abouts');
        } else {
            $imagePath = $about->image;
        }

        $about->update([
            'name' => $request->name,
            'image' => $imagePath,
            'bio' => $request->bio,
            'details' => $request->details
        ]);

        toastr()->success('About updated successfully', 'Success');
        return redirect()->route('about.edit');
    }
}
