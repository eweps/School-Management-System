<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Student;
use App\Observers\StudentObserver;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
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
        if(Schema::hasTable('settings') && Schema::hasColumn('settings', 'name')){
           $systemName = Setting::where('name', 'system_name')->value('value');

            if ($systemName) {
                Config::set('app.name', $systemName);
            }
        }

        Student::observe(StudentObserver::class);
    }
}
