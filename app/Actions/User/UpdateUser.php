<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class UpdateUser
{
    public function update(array $input, User $user): User
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        ])->validate();

        $user->update([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'name' => $input['first_name'],
            'email' => $input['email'],
        ]);

        $user->syncRoles($input['roles']);

        return $user;
    }
}
