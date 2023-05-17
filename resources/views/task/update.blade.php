<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="form">
            <form method="PUT" action={{route("task.update", $task->id)}} id="form">
            @csrf
                <div id="title">
                    <label for="title">タイトル</label><br>
                    <x-input-error :messages="$errors->get("title")" class="ml-2"/>
                    <input type="text" name="title" id="title" value={{$task->title}}>
                </div>
                <div id="contents">
                    <label for="contents">内容</label><br>
                    <x-input-error :messages="$errors->get("contents")" class="ml-2"/>
                    <textarea name="contents" id="contents">{{$task->contents}}</textarea><br>
                </div>
                <div class="complete_flg">
                    <label for="complete_flg">ステータス</label>
                    <select name="complete_flg" id="status">
                        <x-dropdown :value="0">
                            {{ __('未完了') }}
                        </x-dropdown>
                        <x-dropdown :value="1">
                            {{ __('完了') }}
                        </x-dropdown>
                        {{-- <option value="0">未完了</option> --}}
                        {{-- <option value="1">完了</option> --}}
                    </select>
                </div>
                <div id="due_date">
                    <label for="due_date">期限</label><br>
                    <x-input-error :messages="$errors->get("due_date")" class="ml-2"/>
                    <input type="date" name="due_date" id="due_date" value={{$task->due_date}}><br>
                </div>
                <x-primary-button class="ml-4">更新</x-primary-button>
            </form>
        </div>
        <x-primary-button class="ml-4">
            <a href={{route("task.delete", $task->id)}} id="delete">削除</a>
        </x-primary-button>
    </div>
</x-app-layout>