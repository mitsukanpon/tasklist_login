<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
                    @if (session("message"))
                        <p id="message">{{session("message")}}</p>
                    @endif
                    @if (count($tasks)>0)
                        <table class="table-auto">
                        <thead>
                            <tr>
                                <th>タイトル</th>
                                <th>内容</th>
                                <th>ステータス</th>
                                <th>期限</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td><a href={{route("task.edit",$task->id)}}>{{$task->title}}</a></td>
                                    <td>{{$task->contents}}</td>
                                    @if ($task->complete_flg == 0)
                                        <td>未完了</td>
                                    @else
                                        <td>完了</td>
                                    @endif
                                    <td>{{$task->due_date}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    @else
                        <p>登録されているタスクはありません</p>
                    @endif
                    
    <x-primary-button>
        <a href={{route("task.create")}} class="task_create">作成</a>
    </x-primary-button>
</x-app-layout>
