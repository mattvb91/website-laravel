<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Mailgun\Mailgun;

class MailgunController extends Controller
{

    /**
     * ArticleController constructor.
     */
    public function __construct()
    {
        //TODO abstract down to a better place
        View::share('admin_view', true);
    }

    /**
     * Show mailgun status
     *
     * @return Response
     */
    public function __invoke()
    {
        $mg = new Mailgun(env('MAILGUN_API_KEY'));
        $domain = env('MAILGUN_DOMAIN');

        //TODO better error handling if mailgun API is not accessible
        $logs = $mg->get("$domain/log", array('limit' => 16,
                                              'skip'  => 0))->http_response_body->items;

        $domainResponse = $mg->get("domains/$domain");
        $domain = $domainResponse->http_response_body->domain;
        $responseCode = $domainResponse->http_response_code;

        return view('admin.mailgun.index', compact('logs', 'domain', 'responseCode'));
    }
}
