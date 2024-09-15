<x-app-layout>
    <div class="flex flex-col items-center p-6 m-6 justify-center gap-4">
        <p>Title</p>
        <h1 class="font-bold text-xl">{{ $task->title }}</h1>
        <p>Priority</p>
        <select class="">
            <option value="0" {{ $task->priority == 0 ? 'selected' : '' }}>Low</option>
            <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Medium</option>
            <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>High</option>
            <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Urgent</option>
        </select>
        <p>Tag</p>
        <p class="font-bold text-gray-500">{{ $task->tag }}</p>
        <p>Due Date</p>
        <p class="text-blue-500 font-bold">{{ $task->due_date }}</p>
        <p class="font-bold">Task Description</p>
        <p>{{ $task->description }}</p>
        <p>Status: {{ $task->status == 0 ? 'Incomplete' : 'Complete' }}</p>
        <div class="flex flex-col items-center p-6 justify-center gap-4">

            <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit Task</a>
            <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete Task</button>
            </form>
        </div>
    </div>
</x-app-layout>
