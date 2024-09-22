<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function manage()
    {
        $show_data = Service::all();
        return view('backend.service.manage', compact('show_data'));
    }

    public function create()
    {
        return view('backend.service.create');
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
            $imagePath = ImageUploadService::upload($request->file('image'), 'services');
        }

        Service::create([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $imagePath,
        ]);

        toastr()->success('Service created successfully', 'Success');
        return redirect()->route('service.manage');
    }

    // Show the edit form for a service
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.edit', compact('service'));
    }

    // Update a service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:200',
            'details' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'services');
        } else {
            $imagePath = $service->image;
        }

        $service->update([
            'name' => $request->name,
            'details' => $request->details,
            'image' => $imagePath,
        ]);

        toastr()->success('Service updated successfully', 'Success');
        return redirect()->route('service.manage');
    }

    public function toggleStatus($id)
    {
        $service = Service::findOrFail($id);
        $service->status = !$service->status;
        $service->save();

        toastr()->success('Service status updated successfully', 'Success');
        return redirect()->route('service.manage');
    }

    // Delete a service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        toastr()->success('Service deleted successfully', 'Success');
        return redirect()->route('service.manage');
    }
}
