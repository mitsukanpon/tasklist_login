<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    function show(){
        $user_id = auth()->id();
        $tasks = Task::where("user_id", $user_id)->get();
        return view("dashboard", compact("tasks"));
    }

    function admin_show(){
        $tasks = Task::all();
        return view("dashboard", compact("tasks"));
    }

    function create(){
        return view("task.create");
    }

    function store(Request $request){
        //バリデーション
        $validated = $request->validate([
            "title" => "required | max:100",
            "contents" => "required | max:400",
            "due_date" => "required"
        ]);

        //ログイン中のユーザーIDを外部キーとして追加
        $validated["user_id"] = auth()->id();

        #タスクの登録
        $task = Task::create($validated);

        return redirect("dashboard")->with("message", "保存しました");
}

function edit($id){
    $task = Task::where("user_id",auth()->id())->where("id",$id)->first(); //取得されるのが単一のプロパティとするため
    return view("task.update", compact("task"));
}

function update(Request $request, $id){
            //バリデーション
            $validated = $request->validate([
                "title" => "required | max:100",
                "contents" => "required | max:400",
                "due_date" => "required",
                "complete_flg" => "required",
            ]);
    
            //ログイン中のユーザーIDを外部キーとして追加
            $validated["user_id"] = auth()->id();
    
            #タスクの登録
            $task = Task::find($id);
            $task->update($validated);
    
            return redirect("dashboard")->with("message", "変更しました");
}

function delete($id){
    $task = Task::find($id);
    $task->delete();
    return  redirect("dashboard")->with("message", "１件削除しました");
}
}
