<ul class="list-unstyled">
    @foreach ($tasks as $task)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($task->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $task->user->name, ['id' => $task->user->id]) !!} <span class="text-muted">posted at {{ $task->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($task->content)) !!}</p>
                    <p class="mb-0">{!! nl2br(e($task->status)) !!}</p>
                </div>
                <div class="row">
                    @if (Auth::id() == $task->user_id)
                    <div class="col-sm-1">
                        {!! link_to_route('tasks.edit', 'Edit', ['id' => $task->id], ['class' => 'btn btn-info btn-sm']) !!}
                    </div>
                    <div class="col-sm-1">
                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $tasks->links('pagination::bootstrap-4') }}