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
        $this->get('/auth/login')
            ->seeStatusCode(200)
            ->see('Login');

        $this->post('/auth/login', ['email' => 'wrong', 'password' => 'wrong@wrong.com', '_token' => Session::token()])
            ->see('Redirecting to http://localhost/auth/login');
    }

    public function testFormSubmitAuthSuccess()
    {
        $this->get('/auth/login')
            ->seeStatusCode(200)
            ->see('Login');

        $this->createUserAndLogin();
    }

    public function testNeedToBeAuthPages()
    {
        factory(\App\Models\Article::class)->create();
        $article = \App\Models\Article::first();

        $this->get('/admin/article/create')
            ->see('Redirecting to http://localhost/auth/login');

        $this->get('/admin/article/' . $article->getKey() . '/edit')
            ->see('Redirecting to http://localhost/auth/login');
    }

    private function createUserAndLogin()
    {
        $password = str_random(6);

        $user = factory(User::class)->create(['password' => bcrypt($password)]);
        $this->post('/auth/login', ['email' => $user->getEmail(), 'password' => $password, '_token' => Session::token()])
            ->see('<title>Redirecting to http://localhost/admin/article</title>');
    }
}