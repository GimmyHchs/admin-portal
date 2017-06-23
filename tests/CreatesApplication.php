<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Storage;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();
        if (!Storage::disk('test')->has('test_database.sqlite')) {
            Storage::disk('test')->put('test_database.sqlite', '');
            $this->printMessage('Created test_database.sqlite at cococharge/database/');
        }
        
        return $app;
    }
}
