<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
                ->paginate(5)
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
     * @param StoreUserRequest $request
     * @return void
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->fill($request->validated());
        $user->save();
        return Redirect::route('web.users.create')->with('message', 'Cadastro realizado com sucesso!!!');
    }

    /**
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        $user = User::find($id);
        return Inertia::render('Users/Edit', [
            'user' => $user
        ]);
    }

    /**
     * @param UpdateUserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, int $id)
    {
        $user = User::find($id);
        $user->fill($request->validated());
        $user->save();
        return Redirect::route('web.users.edit', [
            'id' => $user->id
        ])->with('message', $request->validated());
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return Redirect::route('web.users');
    }

    /**
     * @return Response
     */
    public function settings()
    {
        return Inertia::render('Settings');
    }
}
