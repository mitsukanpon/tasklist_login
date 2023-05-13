@foreach ($users as $user)
    <p class="user">{{$user->name}}</p>    
@endforeach

<a href={{route("task.create")}}>タスクの登録</a>