<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp() : void
    {
        parent::setUp();
        DB::beginTransaction();
    }

    public function tearDown() : void
    {
        DB::rollback();
        parent::tearDown();
    }

}
