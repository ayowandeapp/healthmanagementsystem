<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
    public function test_add_a_doctors ()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/add-doctor',[
            'name'=>'test',
            'phone'=>'09024472025',
            'speciality'=>'test',
            'room'=>1]);
        var_dump($response);
        $response->assertOk();

        //$response->assertStatus(200);
    }
}
