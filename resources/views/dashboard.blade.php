<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session("message"))
                        <p id="message">{{session("message")}}</p>
                    @endif
                    @if (count($tasks)>0)
                        <table class="tasks">
                            <tr class="column">
                                <th class="title">タイトル</th>
                                <th class="contents">内容</th>
                                <th class="complete_flg">ステータス</th>
                                <th class="due_date">期限</th>
                            </tr>
                            @foreach ($tasks as $task)
                                <tr class="task">
                                    <td class="title">{{$task->title}}</td>
                                    <td class="contents">{{$task->contents}}</td>
                                    @if ($task->complete_flg == 0)
                                        <td class="complete_flg">未完了</td>
                                    @else
                                        <td class="complete_flg">完了</td>
                                    @endif
                                    <td class="due_date">{{$task->date}}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p class="nothing">登録されているタスクはありません</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    <x-primary-button>
        <a href={{route("task.create")}} class="task_create">新規タスク登録</a>
    </x-primary-button>
</x-app-layout>
