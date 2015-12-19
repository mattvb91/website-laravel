<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;

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
        $password = str_random(6);

        $this->get('/auth/login')
            ->seeStatusCode(200)
            ->see('Login');

        $user = factory(User::class)->create(['password' => bcrypt($password)]);
        $this->post('/auth/login', ['email' => $user->getEmail(), 'password' => $password, '_token' => Session::token()])
            ->see('<title>Redirecting to http://localhost</title>');
    }

    public function testNeedToBeAuthPages()
    {
        factory(\App\Models\Article::class)->create();
        $article = \App\Models\Article::first();

        $this->get('/article/create')
            ->see('Redirecting to http://localhost/auth/login');

        $this->get('/article/' . $article->getKey() . '/edit')
            ->see('Redirecting to http://localhost/auth/login');
    }
}