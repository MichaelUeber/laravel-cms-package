<?php

namespace Michaelueber\LaravelCmsPackage;

use Illuminate\Support\ServiceProvider;
use Michaelueber\LaravelCmsPackage\Commands\LaravelCmsPackageCommand;

class LaravelCmsPackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/laravel-cms-package.php' => config_path('laravel-cms-package.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/laravel-cms-package'),
            ], 'views');

            $migrationFileName = 'create_laravel_cms_package_table.php';
            if (! $this->migrationFileExists($migrationFileName)) {
                $this->publishes([
                    __DIR__ . "/../database/migrations/{$migrationFileName}.stub" => database_path('migrations/' . date('Y_m_d_His', time()) . '_' . $migrationFileName),
                ], 'migrations');
            }

            $this->commands([
                LaravelCmsPackageCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-cms-package');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-cms-package.php', 'laravel-cms-package');
    }

    public static function migrationFileExists(string $migrationFileName): bool
    {
        $len = strlen($migrationFileName);
        foreach (glob(database_path("migrations/*.php")) as $filename) {
            if ((substr($filename, -$len) === $migrationFileName)) {
                return true;
            }
        }

        return false;
    }
}
