<?php

namespace RzlApp\LaravelToaster\Providers;

use Illuminate\Support\ServiceProvider;
use RzlApp\LaravelToaster\Toaster;

class RzlLaravelToaster extends ServiceProvider
{
  /**
   * Bootstrap the application services.
   */
  public function boot(): void
  {
    if ($this->app->runningInConsole()) {
      $this->publishes([
        __DIR__ . '/../config/config.php' => config_path('rzl-laravel-toaster.php'),
      ], 'RzlLaravelToaster');
    }
  }

  /**
   * Register the application services.
   */
  public function register(): void
  {
    $this->loadHelpers();

    // Automatically apply the package configuration
    $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'rzl-laravel-toaster');

    // Register the main class to use with the facade
    $this->app->singleton('rzl-laravel-toaster', function () {
      return new Toaster;
    });
  }

  protected function loadHelpers()
  {
    foreach (glob(__DIR__ . '/../Helpers/*.php') as $filename) {
      require_once $filename;
    }
  }
}
