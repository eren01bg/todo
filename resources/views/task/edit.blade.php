<x-app-layout>



    <h1 class="mb-4 text-3xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl my-4">Edit Task</h1>

    <form class="mx-auto flex flex-col items-center justify-center gap-2 w-full max-w-lg" method="POST" action={{ route('tasks.update', ['task' => $task])}}>
        @csrf
        @method("PATCH")

        <div class="mb-5 w-full flex justify-center flex-col">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 hover:text-blue-600 transition-colors">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 w-full flex justify-center flex-col">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 hover:text-blue-600 transition-colors">Description</label>
            <textarea name="description" id="description">{{ $task->description }}</textarea>
            @error('description')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 w-full flex justify-center flex-col">
            <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 hover:text-blue-600 transition-colors">Priority</label>
            <select name="priority" id="priority">
                <option value="0" {{ $task->priority == 0 ? 'selected' : '' }}>Low</option>
                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Medium</option>
                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>High</option>
                <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Urgent</option>
            </select>
            @error('priority')
                <div class="text-red-500">{{ $message }}</div>
            @enderror

        </div>

        <div class="mb-5 w-full flex justify-center flex-col">
            <label for="due_date" class="block mb-2 text-sm font-medium text-gray-900 hover:text-blue-600 transition-colors">Due Date</label>
            <input type="date" name="due_date" id="due_date" value="{{ $task->due_date }}">
            @error('date')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-5 w-full flex justify-center flex-col">
            <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 hover:text-blue-600 transition-colors">Tag</label>
            <input type="text" name="tag" id="tag" value="{{ $task->tag }}">
            @error('tag')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 w-full flex justify-center flex-col">
            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 hover:text-blue-600 transition-colors">Status</label>
            <select name="status" id="status">
                <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Incomplete</option>
                <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>Complete</option>
            </select>
            @error('status')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5 w-full flex justify-center flex-col">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none">Submit</button>
        </div>



    </form>
</x-app-layout>
