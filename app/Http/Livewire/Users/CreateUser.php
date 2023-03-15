<?php

namespace App\Http\Livewire\Users;

use App\Actions\User\CreateNewUser;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public bool $createNewUser = false;

    public array $state = [
        'first_name' => null,
        'last_name'=> null,
        'email' => null,
        'password' => null,
        'password_confirmation' => null,
        'roles' => [],
    ];

    public function create(CreateNewUser $creator)
    {
        $creator->create($this->state);

        $this->emit('userAdded');

        $this->reset('state','createNewUser');
    }

    public function getRolesProperty(): \Illuminate\Database\Eloquent\Collection
    {
        return Role::all();
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
