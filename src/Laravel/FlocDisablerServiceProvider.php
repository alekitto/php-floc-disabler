<?php

namespace Kcs\FlocDisabler\Laravel;

use Illuminate\Support\ServiceProvider;

class FlocDisablerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $kernel = $this->app->make('Illuminate\Contracts\Http\Kernel');
        $kernel->pushMiddleware('Kcs\FlocDisabler\Laravel\FlocDisablerMiddleware');
    }
}
