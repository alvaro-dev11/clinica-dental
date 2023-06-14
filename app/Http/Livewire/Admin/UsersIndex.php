<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

// usando livewire pagination
use Livewire\WithPagination;

class UsersIndex extends Component
{

    // usando livewire pagination
    use WithPagination;

    // propiedad para buscar usuarios
    public $search;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // buscando usuario por su nombre o correo
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.admin.users-index', compact('users'));
    }
}
