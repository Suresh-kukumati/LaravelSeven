@if($todo->completed)
    <span class="fas fa-check text-green-400 cursor-pointer px-2" onclick="event.preventDefault();document.getElementById('form-inCompleted-{{$todo->id}}').submit()"/>
    <form action="{{route('todo.inComplete',$todo->id)}}" id="{{'form-inCompleted-'.$todo->id}}" style="display:none;" method="post">
        @csrf
        @method('delete')

    </form>
@else
    <span onclick="event.preventDefault();document.getElementById('form-completed-{{$todo->id}}').submit()" class="fas fa-check text-gray-300 cursor-pointer px-2"/>
    <form action="{{route('todo.complete',$todo->id)}}" id="{{'form-completed-'.$todo->id}}" style="display:none;" method="post">
        @csrf
        @method('put')

    </form>
@endif