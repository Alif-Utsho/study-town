<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Aboutsection;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class AboutsectionController extends Controller
{
    public function manage()
    {
        $show_data = Aboutsection::all();
        return view('backend.aboutsection.manage', compact('show_data'));
    }

    public function create()
    {
        return view('backend.aboutsection.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'details' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'aboutsections');
        }

        Aboutsection::create([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $imagePath,
        ]);

        toastr()->success('Aboutsection created successfully', 'Success');
        return redirect()->route('aboutsection.manage');
    }

    // Show the edit form for a aboutsection
    public function edit($id)
    {
        $aboutsection = Aboutsection::findOrFail($id);
        return view('backend.aboutsection.edit', compact('aboutsection'));
    }

    // Update a aboutsection
    public function update(Request $request, $id)
    {
        $aboutsection = Aboutsection::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:200',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'aboutsections');
        } else {
            $imagePath = $aboutsection->image;
        }

        $aboutsection->update([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $imagePath,
        ]);

        toastr()->success('Aboutsection updated successfully', 'Success');
        return redirect()->route('aboutsection.manage');
    }

    public function toggleStatus($id)
    {
        $aboutsection = Aboutsection::findOrFail($id);
        $aboutsection->status = !$aboutsection->status;
        $aboutsection->save();

        toastr()->success('Aboutsection status updated successfully', 'Success');
        return redirect()->route('aboutsection.manage');
    }

    // Delete a aboutsection
    public function destroy($id)
    {
        $aboutsection = Aboutsection::findOrFail($id);
        $aboutsection->delete();

        toastr()->success('Aboutsection deleted successfully', 'Success');
        return redirect()->route('aboutsection.manage');
    }
}
