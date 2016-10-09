<?php

namespace Test;

use App\Models\User;
use Illuminate\Support\Facades\Session;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function createUserAndLogin()
    {
        $password = str_random(6);

        $user = factory(User::class)->create(['password' => bcrypt($password)]);
        $this->post('/login', ['email' => $user->getEmail(), 'password' => $password, '_token' => Session::token()])
            ->see('<title>Redirecting to http://localhost/admin/article</title>');
    }

}
