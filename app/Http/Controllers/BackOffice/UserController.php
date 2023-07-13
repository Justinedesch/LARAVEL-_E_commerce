<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, UserRepositoryInterface $userRepository): View|Application|Factory
    {
        $usersList = $userRepository->getAllUsers();
        return view('backoffice/users/bo_users', compact('usersList', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        return view('backoffice/users/user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, UserRepositoryInterface $userRepository): RedirectResponse
    {
        $request->validate([
            'gender' => ['bail', 'required','in:Mme,Mlle,M', 'not_in:0'],
            'lastname' => ['bail', 'required', 'string', 'max:255'],
            'firstname' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['bail', 'required', 'confirmed', Rules\Password::defaults()],
            'phone1' => ['required_if:bail,string,regex:/^([0-9\s\-\+\(\)]*)$/,max:14'],
            'phone2' => ['bail', 'required', 'regex:/^([0-9\s\-\+\(\)]*)$/','string', 'min:10', 'max:14'],
            'roles' => ['bail', 'required','in:ROLE_USER,ROLE_ADMIN'],
        ]);

        $user = $userRepository->createUser([
            'gender' => $request->gender,
            'lastname' => $request->lastname ,
            'firstname' => $request->firstname,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'phone1' => !empty($request->phone1) ? $request->phone1 : null,
            'phone2' => $request->phone2,
            'roles' => $request->roles
        ]);

        event(new Registered($user));

        return redirect()->route('users.index')->with('success', 'Utilisateur crée avec succés.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, UserRepositoryInterface $userRepository): View|Application|Factory
    {
        $userId = $request->route('id');
        $user = $userRepository->getUsertById($userId);
        $addressByUser = $userRepository->getAddressByUser($userId);
        return view('backoffice/users/user_show', ['user' => $user, 'addressByUser' => $addressByUser ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, UserRepositoryInterface $userRepository): View|Application|Factory
    {
        $userId = $request->route('id');
        $user = $userRepository->getUsertById($userId);
        return view('backoffice/users/user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRepositoryInterface $userRepository): RedirectResponse
    {

        $request->validate([
            'gender' => ['bail', 'nullable','in:Mme,Mlle,M', 'not_in:0'],
            'lastname' => ['bail', 'nullable', 'string', 'max:255'],
            'firstname' => ['bail', 'nullable', 'string', 'max:255'],
            'email' => ['bail', 'nullable', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['bail', 'nullable', 'confirmed', Rules\Password::defaults()],
            'phone1' => ['bail','nullable','string','regex:/^([0-9\s\-\+\(\)]*)$/','max:14'],
            'phone2' => ['bail', 'nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/','string', 'min:10', 'max:14'],
            'roles' => ['bail', 'nullable','in:ROLE_USER,ROLE_ADMIN', 'not_in:0'],
        ]);

        $userId = $request->route('id');
        $user = $userRepository->getUsertById($userId);

        $userRepository->updateUser($user->id, [
            'gender' => !empty($request->gender) ? $request->gender : $user->gender,
            'lastname' => !empty($request->lastname) ? $request->lastname : $user->lastname,
            'firstname' => !empty($request->firstname) ? $request->firstname : $user->firstname,
            'email' => !empty($request->email) ? $request->email : $user->email,
            'password' => $request->password != '' ? Hash::make($request->password) : $user->password,
            'phone1' => !empty($request->phone1) ? $request->phone1 : $user->phone1,
            'phone2' => !empty($request->phone2) ? $request->phone2 : $user->phone2,
            'roles' => $request->roles
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succés.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, UserRepositoryInterface $userRepository): RedirectResponse
    {
        $userId = $request->route('id');
        $user = $userRepository->getUsertById($userId);
        $userRepository->deleteUser($user->id);
        return redirect()->route('users.index')->with('success', 'Utilisateurs supprimé avec succés.');
    }
}
