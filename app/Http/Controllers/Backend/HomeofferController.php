<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Homeoffer;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class HomeofferController extends Controller
{
    public function manage()
    {
        $show_data = Homeoffer::all();
        return view('backend.homeoffer.manage', compact('show_data'));
    }

    public function create()
    {
        return view('backend.homeoffer.create');
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
            $imagePath = ImageUploadService::upload($request->file('image'), 'homeoffers');
        }

        Homeoffer::create([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $imagePath,
        ]);

        toastr()->success('Homeoffer created successfully', 'Success');
        return redirect()->route('homeoffer.manage');
    }

    // Show the edit form for a homeoffer
    public function edit($id)
    {
        $homeoffer = Homeoffer::findOrFail($id);
        return view('backend.homeoffer.edit', compact('homeoffer'));
    }

    // Update a homeoffer
    public function update(Request $request, $id)
    {
        $homeoffer = Homeoffer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:200',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'homeoffers');
        } else {
            $imagePath = $homeoffer->image;
        }

        $homeoffer->update([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $imagePath,
        ]);

        toastr()->success('Homeoffer updated successfully', 'Success');
        return redirect()->route('homeoffer.manage');
    }

    public function toggleStatus($id)
    {
        $homeoffer = Homeoffer::findOrFail($id);
        $homeoffer->status = !$homeoffer->status;
        $homeoffer->save();

        toastr()->success('Homeoffer status updated successfully', 'Success');
        return redirect()->route('homeoffer.manage');
    }

    // Delete a homeoffer
    public function destroy($id)
    {
        $homeoffer = Homeoffer::findOrFail($id);
        $homeoffer->delete();

        toastr()->success('Homeoffer deleted successfully', 'Success');
        return redirect()->route('homeoffer.manage');
    }
}
