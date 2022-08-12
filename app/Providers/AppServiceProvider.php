<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ZeebeService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(ZeebeService::class, function($app) {
			return new ZeebeService();
		});
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        /*$this->app->bindMethod([SelectAssigneeWorker::class, 'handle'], function ($job, $app) {
			return $job->handle($app->make(ZeebeService::class));
		});*/
    }
}
