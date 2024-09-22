<?php

namespace App\Providers;

use App\Models\Concern;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Generalsetting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $contactInfo = Contact::whereStatus(1)->first();
        view()->share('contactInfo', $contactInfo);

        $concerns = Concern::whereStatus(1)->latest()->get();
        view()->share('concerns', $concerns);

        $generalsetting = Generalsetting::first();
        view()->share('generalsetting', $generalsetting);

        $application_courses = Course::whereStatus(1)->get();
        view()->share('application_courses', $application_courses);
    }
}
