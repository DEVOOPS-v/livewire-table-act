<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Archive a post
    public function archive($id)
    {
        $post = Post::findOrFail($id);
        $post->is_archived = true;
        $post->save();

        session()->flash('message', 'Post archived successfully!');
    }

    // Delete a post
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        session()->flash('message', 'Post deleted successfully!');
    }

    public function render()
    {
        $posts = Post::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.posts.table', [
            'posts' => $posts,
        ]);
    }
}
