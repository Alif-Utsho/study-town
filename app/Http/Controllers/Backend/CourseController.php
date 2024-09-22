<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function manage()
    {
        $show_data = Course::all();
        return view('backend.course.manage', compact('show_data'));
    }

    public function create()
    {
        return view('backend.course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'courses');
        }

        Course::create([
            'name' => $request->name,
            'image' => $imagePath,
            'front_view' => $request->has('front_view')
        ]);

        toastr()->success('Course created successfully', 'Success');
        return redirect()->route('course.manage');
    }

    // Show the edit form for a Course
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('backend.course.edit', compact('course'));
    }

    // Update a Course
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:200',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = ImageUploadService::upload($request->file('image'), 'Courses');
        } else {
            $imagePath = $course->image;
        }

        $course->update([
            'name' => $request->name,
            'image' => $imagePath,
            'front_view' => $request->has('front_view')
        ]);

        toastr()->success('Course updated successfully', 'Success');
        return redirect()->route('course.manage');
    }

    public function toggleStatus($id)
    {
        $course = Course::findOrFail($id);
        $course->status = !$course->status;
        $course->save();

        toastr()->success('Course status updated successfully', 'Success');
        return redirect()->route('course.manage');
    }

    // Delete a Course
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        toastr()->success('Course deleted successfully', 'Success');
        return redirect()->route('course.manage');
    }
}
