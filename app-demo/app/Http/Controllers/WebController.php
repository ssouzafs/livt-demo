<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
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
    public function users(Request $request)
    {
        return Inertia::render('Users/Index', [
            'users' => User::query()
                ->when($request->search, function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('id', "{$search}");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'created_at' => $user->created_at->format('d/m/Y H:i')
                ]),
            'filters' => $request->only(['search'])
        ]);
    }

    /**
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Users/Create');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->save();

        return redirect()->route('web.users.create')->with('message', 'Cadastro realizado com sucesso!!!');
    }

    /**
     * @return Response
     */
    public function settings()
    {
        return Inertia::render('Settings');
    }
}
