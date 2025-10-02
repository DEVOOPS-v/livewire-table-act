<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    // Keeps the search term in the query string (?search=...)
    protected $updatesQueryString = ['search'];

    // Bootstrap pagination style (optional, if you use Tailwind you can remove this)
    protected string $paginationTheme = 'tailwind';

    /**
     * Reset to the first page whenever the search term changes
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Archive a user (requires an "is_archived" column in users table)
     */
    public function archive(int $id): void
    {
        $user = User::findOrFail($id);
        $user->update(['is_archived' => true]);

        session()->flash('message', 'User archived successfully.');
    }

    /**
     * Permanently delete a user
     */
    public function delete(int $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('message', 'User deleted successfully.');
    }

    /**
     * Render the user table with search + pagination
     */
    public function render()
    {
        $employees = User::query()
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhere('id', $this->search); // allow searching by ID too
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.users.table', [
            'employees' => $employees,
        ]);
    }
}
