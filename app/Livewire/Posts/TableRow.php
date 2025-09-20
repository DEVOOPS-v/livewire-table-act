<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class TableRow extends Component
{

    public $posts; 
    public function render()
    {
        return view('livewire..posts.table-row');
    }
}
