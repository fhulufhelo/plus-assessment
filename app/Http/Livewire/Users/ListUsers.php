<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    protected $listeners = ['userAdded' => '$refresh'];

    public function getUsersProperty(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return User::with('roles')
            ->where('first_name', 'like', '%'.$this->search.'%')
            ->paginate(2);
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
