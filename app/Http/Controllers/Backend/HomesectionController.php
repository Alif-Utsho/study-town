<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Homesection;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class HomesectionController extends Controller
{
    public function edit()
    {
        $homesection = Homesection::first();
        return view('backend.homesection.edit', compact('homesection'));
    }

    // Update a Homesection
    public function update(Request $request, $id)
    {
        $homesection = Homesection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:200',
            'about_title' => 'required|string|max:200',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('banner')) {
            $bannerPath = ImageUploadService::upload($request->file('banner'), 'homesections');
        } else {
            $bannerPath = $homesection->banner;
        }

        if ($request->hasFile('about_image')) {
            $about_imagePath = ImageUploadService::upload($request->file('about_image'), 'homesections');
        } else {
            $about_imagePath = $homesection->about_image;
        }

        $homesection->update([
            'title' => $request->title,
            'banner' => $bannerPath,
            'about_title' => $request->about_title,
            'about_text' => $request->about_text,
            'about_image' => $about_imagePath,
        ]);

        toastr()->success('Homesection updated successfully', 'Success');
        return redirect()->route('homesection.edit');
    }
}
