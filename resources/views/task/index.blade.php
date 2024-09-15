<x-app-layout>

    <div class="details-container">

        <div class="details-container-left">
            <div class="my-todo">
                Hi, {{ request()->user()->name }},
                this is your to-do list
            </div>
            <div class="this-month">
                September 2024
            </div>
        </div>

        <div class="details-container-right">
            <a href="{{route('tasks.create')}}" class="new-task-button">
                <span class="plus-icon">+</span> New Task
            </a>
        </div>

    </div>

    <div class="to-do-list-container">
        @foreach ($tasks as $task)
            <div class="task-container">
                <div class="task-details-holder">
                    <div class="task-details-upper">
                        <a href="{{route('tasks.show', ['task' => $task])}}" class="task-title">{{ $task->title }}</a>
                        <select class="task-priority" disabled>
                            <option value="0" {{ $task->priority == 0 ? 'selected' : '' }}>Low</option>
                            <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>Medium</option>
                            <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>High</option>
                            <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Urgent</option>
                        </select>
                    </div>
                    <div class="task-details-lower">
                        <p class="task-tag">{{ $task->tag }}</p>
                        <p class="task-due-date">{{ $task->due_date }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
