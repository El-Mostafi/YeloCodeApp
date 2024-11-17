<?php

namespace App\Http\Livewire;
use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TablePosts extends Component
{
    use WithPagination;
    protected $listeners = ['profile'];
    public function render()
    {
        return view('livewire.table-posts',[
            'todos'=>Todo::latest()->paginate(3)
        ]);
    }
}
