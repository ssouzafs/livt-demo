<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
