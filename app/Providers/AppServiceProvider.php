<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer('*', function ($view) {
            $default_settings = [];
            $default_settings['language'] = 'en';

            $gematriaverse_user_settings = [];

            foreach ($default_settings as $setting_name => $default_value) {
                $value = $default_value;
                if (auth()->check()) {
                    if (auth()->user()->setting($setting_name) == null) {
                        Setting::create([
                            'user_id' => auth()->id(),
                            'key' => $setting_name,
                            'value' => $default_value
                        ]);
                    }

                    $value = auth()->user()->setting($setting_name)->value;
                }

                $gematriaverse_user_settings[$setting_name] = $value;
            }

            $view->with('gematriaverse_user_settings', $gematriaverse_user_settings);
        });
    }
}
