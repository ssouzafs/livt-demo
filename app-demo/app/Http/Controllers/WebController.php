<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return Inertia::render('Users', [
            'users' => User::all()->map(fn($user) => [
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at->format('d/m/Y H:i')
            ])
        ]);
    }

    /**
     * @return Response
     */
    public function settings()
    {
        return Inertia::render('Settings');
    }
}
