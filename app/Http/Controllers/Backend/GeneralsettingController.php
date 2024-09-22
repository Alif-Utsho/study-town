<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class GeneralsettingController extends Controller
{
    public function edit()
    {
        $generalsetting = Generalsetting::first();
        return view('backend.generalsetting.edit', compact('generalsetting'));
    }

    // Update a Generalsetting
    public function update(Request $request, $id)
    {
        $generalsetting = Generalsetting::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:200',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = ImageUploadService::upload($request->file('logo'), 'generalsettings');
        } else {
            $logoPath = $generalsetting->logo;
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = ImageUploadService::upload($request->file('favicon'), 'generalsettings');
        } else {
            $faviconPath = $generalsetting->favicon;
        }

        $generalsetting->update([
            'name' => $request->name,
            'logo' => $logoPath,
            'favicon' => $faviconPath,
        ]);

        toastr()->success('Generalsetting updated successfully', 'Success');
        return redirect()->route('generalsetting.edit');
    }
}
