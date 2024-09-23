<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function manage()
    {
        $show_data = Application::latest()->get();
        return view('backend.application.manage', compact('show_data'));
    }
}
