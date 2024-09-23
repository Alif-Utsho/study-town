<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Socialicon;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class SocialiconController extends Controller
{
    public function manage()
    {
        $show_data = Socialicon::all();
        return view('backend.socialicon.manage', compact('show_data'));
    }

    public function create()
    {
        return view('backend.socialicon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|string|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'socialicons');
        }

        Socialicon::create([
            'link' => $request->link,
            'logo' => $imagePath,
        ]);

        toastr()->success('Socialicon created successfully', 'Success');
        return redirect()->route('socialicon.manage');
    }

    // Show the edit form for a Socialicon
    public function edit($id)
    {
        $socialicon = Socialicon::findOrFail($id);
        return view('backend.socialicon.edit', compact('socialicon'));
    }

    // Update a Socialicon
    public function update(Request $request, $id)
    {
        $socialicon = Socialicon::findOrFail($id);

        $request->validate([
            'link' => 'required|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'Socialicons');
        } else {
            $imagePath = $socialicon->logo;
        }

        $socialicon->update([
            'link' => $request->link,
            'logo' => $imagePath,
        ]);

        toastr()->success('Socialicon updated successfully', 'Success');
        return redirect()->route('socialicon.manage');
    }

    public function toggleStatus($id)
    {
        $socialicon = Socialicon::findOrFail($id);
        $socialicon->status = !$socialicon->status;
        $socialicon->save();

        toastr()->success('Socialicon status updated successfully', 'Success');
        return redirect()->route('socialicon.manage');
    }

    // Delete a Socialicon
    public function destroy($id)
    {
        $socialicon = Socialicon::findOrFail($id);
        $socialicon->delete();

        toastr()->success('Socialicon deleted successfully', 'Success');
        return redirect()->route('socialicon.manage');
    }
}
