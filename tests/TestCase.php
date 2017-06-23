<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Traits\MessagePrintable;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, MessagePrintable;
}
