<?php


use Michaelueber\LaravelCmsPackage\Tests\TestCase;

class LaravelCmsPackageCommandTest extends TestCase
{
    /** @test */
    public function the_package_command_works()
    {
        $this->artisan('laravel-cms-package')->assertExitCode(0);
    }
}
