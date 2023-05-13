<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="form">
            <form method="POST" action={{route("task.store")}} id="form">
            @csrf
                <div id="title">
                    <label for="title">タイトル</label><br>
                    <x-input-error :messages="$errors->get("title")" class="ml-2"/>
                    <input type="text" name="title" id="title" value={{old("title")}}>
                </div>
                <div id="contents">
                    <label for="contents">内容</label><br>
                    <x-input-error :messages="$errors->get("contents")" class="ml-2"/>
                    <textarea name="contents" id="contents">{{old("contents")}}</textarea><br>
                </div>
                <div id="due_date">
                    <label for="due_date">期限</label><br>
                    <x-input-error :messages="$errors->get("due_date")" class="ml-2"/>
                    <input type="date" name="due_date" id="due_date" value={{old("due_date")}}><br>
                </div>
                <x-primary-button class="ml-4">登録</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
