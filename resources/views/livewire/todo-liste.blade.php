<div>
    @if(session('error'))
    <div role="alert">
  <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
    Error
  </div>
  <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
    <p>{{session('error')}}</p>
  </div>
</div>
    @endif
<div class="container content py-6 mx-auto">
            <div class="mx-auto">
                <div id="create-form" class="hover:shadow p-6 bg-white border-blue-500 border-t-2">
                    <div class="flex ">
                        <h2 class="font-semibold text-lg text-gray-800 mb-5">Create New Todo</h2>
                    </div>
                    <div>
                        <form wire:submit.prevent="create">
                            <div class="mb-6">
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                    Todo </label>
                                <input wire:model="todo" name="todo" type="text" id="title" placeholder="Todo.."
                                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                                    
                                @error('todo')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror

                            </div>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">Create
                                +</button>
                            @if(session('success'))
                            <span class="text-green-500 text-xs">{{session('success')}}</span>
                            @endif
                                <label for="image"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                    Image </label>
                                <input wire:model="image"  type="file" id="image" accept="image/jpeg ,image/png"
                                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                                    
                                @error('image')
                                <span class="text-red-600">{{$message}}</span>
                                @enderror
                                
                                @if ($image)
                                <img class="rounded w-10 h-10 mt-5 block" src="{{$image->temporaryUrl()}}" alt="">                                
                                @endif
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center">
            <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <input wire:model.debounce.300ms="search" name="search" type="text" placeholder="Search..."
                    class="bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100" />
            </div>          

        </div>
<div id="todos-list"> 
            @foreach ($todos as $mytodo )
            <div class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-blue-500 hover:shadow">
                <div class="flex justify-between space-x-2">
                    
                    @if ($todoId==$mytodo->id)
                    <div>
                    <input wire:model="newTodo" type="text" placeholder="Todo.." class="mb-2 bg-gray-100  text-gray-900 text-sm rounded W-full  p-2.5">
                    @error('newTodo')
                        <span class="text-red-500 text-xs block">{{$message}}</span>
                    @enderror
                    </div>
                                
                            
                    @else
                    <h3 class="text-lg text-semibold text-gray-800">{{$mytodo->name}}</h3>
                    @endif
                    <div class="flex items-center space-x-2">
                        <button wire:click="edit({{$mytodo->id}},'{{ $mytodo->name }}')" class="text-sm text-teal-500 font-semibold rounded hover:text-teal-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </button>
                        <button wire:click="delet({{$mytodo->id}})" class="text-sm text-red-500 font-semibold rounded hover:text-teal-800 mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                    </div>
                    

                    
                </div>
                <span class="text-xs text-gray-500"> {{$mytodo->created_at}} </span>
                @if ($todoId==$mytodo->id)
                <div class="mt-3 text-xs text-gray-700 ">
                <button wire:click="update" class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Update</button>
                <button wire:click="cancel" class="mt-3 px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">Cancel</button> 
                    
                </div>
                @endif
            </div>
            @endforeach

            
            <div class="w-25 mx-auto"><span>{{$todos->links()}}</span></div>
            
        </div>
        
        
</div>
