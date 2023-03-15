<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class CreateNewUser
{
    public function create(array $input): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ])->validate();

        $user =  User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'name' => $input['first_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $user->syncRoles($input['roles']);

        return $user;
    }
}
