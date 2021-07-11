<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DepartmentTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        if (DB::connection()->getDatabaseName()) {
            echo "Connected sucessfully to database ".DB::connection()->getDatabaseName().".";
        }
        $response = $this->get('/departments');
//        dd($response->getContent());
    }
}
