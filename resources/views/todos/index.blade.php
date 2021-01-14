@extends('todos.layout')
@section('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl">All your todos </h1>
    <a href="{{route('todo.create')}}" class="mx-5 py-2 text-blue-400 rounded cursor-pointer text-white">
        <span class="fas fa-plus-circle " />
    </a>
</div>
<ul class="my-5">
    <x-alert />
    @forelse($todos as $todo)
        <li class="flex justify-between p-2">
            <div>
                @include('todos.complete-button')
            </div>
            @if($todo->completed)
                <p class="line-through">{{ $todo->title }}</p>
            @else
                <p>{{ $todo->title }}</p>
            @endif
            <div>
                <a href="{{route('todo.edit',$todo->id)}}" class="text-orange-400 text-white">
                    <span class="fas fa-edit px-2 "/>
                </a>
                <span class="fas fa-trash text-red-500 px-2 cursor-pointer" 
                    onclick="event.preventDefault();
                        if(confirm('Are you sure you want to delete?')){
                            document.getElementById('form-delete-{{$todo->id}}').submit()
                        }
                        "/>
                <form action="{{route('todo.destroy',$todo->id)}}" method="post" id="{{'form-delete-'.$todo->id}}">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </li>
    @empty
        <p>No task available, create one</p>
    @endforelse
</ul>
@endsection