<?php

namespace Test\Acceptance;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Test\TestCase;

class AuthTest extends TestCase
{

    use DatabaseTransactions;


    public function testFormSubmitAuthError()
    {
        $this->get('/login')
            ->seeStatusCode(200)
            ->see('Login');

        $this->post('/login', ['email' => 'wrong', 'password' => 'wrong@wrong.com', '_token' => Session::token()])
            ->see('Redirecting to http://localhost/login');
    }

    public function testFormSubmitAuthSuccess()
    {
        $this->get('/login')
            ->seeStatusCode(200)
            ->see('Login');

        $this->createUserAndLogin();
    }

    public function testNeedToBeAuthPages()
    {
        factory(\App\Models\Article::class)->create();
        $article = \App\Models\Article::first();

        $this->get('/admin/article/create')
            ->assertResponseStatus(302);

        $this->get('/admin/article/' . $article->getKey() . '/edit')
            ->assertResponseStatus(302);
    }
}