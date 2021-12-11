<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return Inertia::render('User/Index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return Inertia::render('User/Create');
    }

    /**
     * @param  UserRequest  $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $password = Hash::make($request->input('password'));
        $role = $request->input('role') === UserRoleEnum::USER->value ? 'user' : 'admin';
        $user = new User();
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $role,
            'password' => $password,
        ]);
        $user->save();
        return Redirect::route('users.show', $user);
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return Response
     */
    public function show(User $user)
    {
        return Inertia::render('User/Show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return Response
     */
    public function edit(User $user)
    {
        return Inertia::render('User/Edit', compact('user'));
    }


    /**
     * 更新用户
     * @param  Request  $request
     * @param  User  $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $user->update($request->only('name', 'email'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            User::query()->where('id', $user->id)->delete();

        } catch (Exception $exception) {
            throw new $exception;
        }

        return back();
    }
}
