<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search']; // optional, keeps search in URL

    public function updatingSearch()
    {
        $this->resetPage(); // reset to page 1 when searching
    }

    // Archive user (you may need to add an "is_archived" column in users table)
    public function archive($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_archived' => true]);
    }

    // Delete user
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function render()
    {
        $employees = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->paginate(10);

        return view('livewire.users.table', [
            'employees' => $employees,
        ]);
    }
}
