<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App template</title>

    <script src="https://cdn.tailwindcss.com"></script>
 @livewireStyles
</head>

<body>
@livewire('navigation')
    <div id="content" class="mx-auto" style="max-width:500px;">
        @livewire('todo-liste')
    </div>
    <div class="mt-20">
    @livewire('table-posts')
    </div>
    @livewireScripts
</body>

</html>