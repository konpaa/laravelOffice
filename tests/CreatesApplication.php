<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        putenv('DB_CONNECTION=sqlite_testing');

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

//    public function setUp()
//    {
//        parent::setUp();
//        Artisan::call('migrate');
//    }
//
//    public function tearDown()
//    {
//        Artisan::call('migrate:reset');
//        parent::tearDown();
//    }
}
