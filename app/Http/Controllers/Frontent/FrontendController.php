<?php

namespace App\Http\Controllers\Frontent;

use App\Http\Controllers\Controller;
use App\Mail\ApplicationSubmitted;
use App\Models\About;
use App\Models\Aboutsection;
use App\Models\Application;
use App\Models\Course;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index() {
        $courses = Course::where('front_view', 1)->limit(4)->get();
        return view('frontend.index', compact('courses'));
    }

    public function about() {
        $about = About::whereStatus(1)->first();
        $about_sections = Aboutsection::whereStatus(1)->get();
        return view('frontend.pages.about', compact('about', 'about_sections'));
    }

    public function service() {
        $services = Service::whereStatus(1)->get();
        return view('frontend.pages.service', compact('services'));
    }

    public function course() {
        $courses = Course::whereStatus(1)->latest()->get();
        return view('frontend.pages.course', compact('courses'));
    }

    public function contact() {
        return view('frontend.pages.contact');
    }

    public function apply(){
        return view('frontend.pages.apply');
    }

    public function applicationsubmit(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'resident' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'other_course' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:500',
        ]);

        $course = $validatedData['course'] === 'other' ? $validatedData['other_course'] : $validatedData['course'];

        $application = new Application();
        $application->name = $validatedData['name'];
        $application->email = $validatedData['email'];
        $application->phone = $validatedData['phone'];
        $application->city = $validatedData['city'];
        $application->resident = $validatedData['resident'];
        $application->course = $course;
        $application->message = $validatedData['message'];

        $application->save();

        $adminEmail = 'ashahriar29@gmail.com';
        Mail::to($adminEmail)->send(new ApplicationSubmitted($validatedData));

        toastr()->success('We Have Received Your Application', 'Thank Your');
        return redirect()->back();
    }
}
