<?php

namespace App\Http\Livewire;
use App\Models\Todo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class TodoListe extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $todo;
    public $search;
    public $todoId;
    public $newTodo;
    public $image;
    public function Updated($field){
        $this->validateOnly($field,[
            'todo' => 'required|min:3|max:15',
            'newTodo' => 'required|min:3|max:15',
            'search' => 'required',
            'image' => 'nullable|sometimes|max:1024'
        ]);
    }
    public function update(){
        Todo::find($this->todoId)->update([
            'name' => $this->newTodo
        ]);
    }
    public function cancel(){
        $this->reset('todoId','newTodo');
    }
    public function edit($id,$name){
            $this->todoId=$id;
            $this->newTodo=$name;
            $this->confirme=true;
    }
    public function delet($id){
        try {
            Todo::findOrFail($id)->delete();
        } catch (\Exception $e) {
            session()->flash('error','Failed to delete');
        }
    }
    public function create(){
        $todo=Todo::create([
            'name' => $this->todo,
            'image' => $this->image->store('uploads','public')
        ]);
        $this->reset('todo');
        session()->flash('success','Created.');
        $this->resetPage();
        $this->emit('profile', $todo->image);
    }
    public function render()
    {
        return view('livewire.todo-liste',[
            'todos' => Todo::latest()->where('name', 'like', '%' . $this->search . '%')->paginate(3)
        ]);
    }
}
