<?php

namespace App\Http\Livewire;
use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class Navigation extends Component
{
    use WithPagination;
    public $image;

    protected $listeners = ['profile'];

    public function profile($image)
    {
        $this->image = $image;
    }
    public function render()
    {
        
        return view('livewire.navigation',[
            'image' =>$this->image,
        ]);
    }
}
