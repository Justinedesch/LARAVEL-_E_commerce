<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'gender' => ['bail', 'required','in:Mme,Mlle,M', 'not_in:0'],
            'lastname' => ['bail', 'required', 'string', 'max:255'],
            'firstname' => ['bail', 'required', 'string', 'max:255'],
            'email' => ['bail', 'required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['bail', 'required', 'confirmed', Rules\Password::defaults()],
            'address' => ['bail', 'required', 'string', 'max:255'],
            'town' => ['bail', 'required', 'string', 'max:255'],
            'department' => ['bail', 'required', 'integer'],
            'country' => ['bail', 'required', 'string', 'max:255'],
            'phone1' => ['required_if:bail,string,regex:/^([0-9\s\-\+\(\)]*)$/,max:14'],
            'phone2' => ['bail', 'required', 'regex:/^([0-9\s\-\+\(\)]*)$/','string', 'min:10', 'max:14'],
        ]);

        $user = User::create([
            'gender' => $request->gender,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'town' => $request->town,
            'department' => $request->department,
            'country' => $request->country,
            'phone1' => !empty($request->phone1) ? $request->phone1 : null,
            'phone2' => $request->phone2,
            'roles' => 'ROLE_USER',
            'created_at' => new \DateTime('now', new \DateTimeZone('Europe/Paris')),
            'updated_at' => new \DateTime('now', new \DateTimeZone('Europe/Paris')),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
