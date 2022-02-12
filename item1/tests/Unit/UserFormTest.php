<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserFormTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_form_full()
    {
        $view = $this->view('welcome',
            [
                'name' => 'Taylor',
                'login' => 'Taylor',
                'cep' => 'Taylor',
                'email' => 'Taylor',
                'password' => 'Taylor',
            ]
        );
    }
}
