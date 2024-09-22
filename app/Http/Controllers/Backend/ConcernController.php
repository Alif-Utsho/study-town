<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Concern;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class ConcernController extends Controller
{
    public function manage()
    {
        $show_data = Concern::all();
        return view('backend.concern.manage', compact('show_data'));
    }

    public function create()
    {
        return view('backend.concern.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'concerns');
        }

        Concern::create([
            'image' => $imagePath,
        ]);

        toastr()->success('Concern created successfully', 'Success');
        return redirect()->route('concern.manage');
    }

    // Show the edit form for a Concern
    public function edit($id)
    {
        $concern = Concern::findOrFail($id);
        return view('backend.concern.edit', compact('concern'));
    }

    // Update a Concern
    public function update(Request $request, $id)
    {
        $concern = Concern::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'concerns');
        } else {
            $imagePath = $concern->image;
        }

        $concern->update([
            'image' => $imagePath,
        ]);

        toastr()->success('Concern updated successfully', 'Success');
        return redirect()->route('concern.manage');
    }

    public function toggleStatus($id)
    {
        $concern = Concern::findOrFail($id);
        $concern->status = !$concern->status;
        $concern->save();

        toastr()->success('Concern status updated successfully', 'Success');
        return redirect()->route('concern.manage');
    }

    // Delete a Concern
    public function destroy($id)
    {
        $concern = Concern::findOrFail($id);
        $concern->delete();

        toastr()->success('Concern deleted successfully', 'Success');
        return redirect()->route('concern.manage');
    }
}
