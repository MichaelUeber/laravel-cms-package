<?php

namespace Michaelueber\LaravelCmsPackage\Commands;

use Illuminate\Console\Command;

class LaravelCmsPackageCommand extends Command
{
    public $signature = 'laravel-cms-package';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
