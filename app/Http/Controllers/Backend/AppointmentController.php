<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function manage()
    {
        $show_data = Appointment::latest()->get();
        return view('backend.appointment.manage', compact('show_data'));
    }
}
