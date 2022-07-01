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
        return Inertia::render('Home', ['username' => 'Sergio']);
    }

    /**
     * @return Response
     */
    public function users()
    {
        return Inertia::render('Users', [
            'time' => now()->toTimeString(),
        ]);
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
