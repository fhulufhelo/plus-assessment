<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class ListUsers extends Component
{
    protected $listeners = ['userAdded' => '$refresh'];

    public function getUsersProperty(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::with('roles')->get();
    }

    public function edit($id)
    {
        $this->emit('editUser', $id);
    }

    public function render()
    {
        return view('livewire.users.list-users');
    }
}
