<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class WebController extends Controller
{
    /**
     * @return Response
     */
    public function home()
    {
        return Inertia::render('Home');
    }

    /**
     * @return Response
     */
    public function users()
    {
        sleep(2);
        return Inertia::render('Users');
    }

    /**
     * @return Response
     */
    public function settings()
    {
        return Inertia::render('Settings');
    }

    public function logout()
    {
        dd('Loggout');
    }
}
