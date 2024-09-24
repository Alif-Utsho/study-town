<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Appointment;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $counter = [];
        $counter['total_applications'] = Application::all()->count();
        $counter['todays_applications'] = Application::whereDate('created_at', Carbon::today())->count();

        $counter['total_appointments'] = Appointment::all()->count();
        $counter['todays_appointments'] = Appointment::whereDate('created_at', Carbon::today())->count();

        $applications = Application::all();
        $courses = Course::whereStatus(1)->get();

        return view('backend.dashboard.index', compact('counter', 'applications', 'courses'));
    }
}
