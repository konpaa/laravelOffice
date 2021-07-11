<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class DepartmentsController extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/departments');
        $response->assertStatus(200);
    }
}
