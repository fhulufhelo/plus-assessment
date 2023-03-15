<?php

namespace App\Http\Livewire\Users;

use App\Actions\User\UpdateUser;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    protected $listeners = ['editUser'];
    public $userId;

    public bool $updateNewUser = false;

    public array $state = [
        'first_name' => null,
        'last_name'=> null,
        'email' => null,
        'password' => null,
        'roles' => [],
    ];


    public function editUser(int $id)
    {
        $user = User::with('roles')->find($id);

        $this->userId = $id;

        $this->state = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $user->password,
            'roles' => $user->roles->pluck('id')->all(),
        ];

        $this->updateNewUser = true;
    }

    public function update(UpdateUser $creator)
    {
        $user = User::find($this->userId);

        $creator->update($this->state,$user );

        $this->emit('userAdded');

        $this->reset(['state', 'updateNewUser']);
    }


    public function getRolesProperty(): \Illuminate\Database\Eloquent\Collection
    {
        return Role::all();
    }

    public function render()
    {
        return view('livewire.users.edit-user');
    }
}
