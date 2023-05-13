<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    //$fillableでモデルに一括登録したいカラムを設定
    protected $fillable = [
        "title",
        "contents",
        "due_date",
        "complete_flg",
        "user_id",
    ];

    //リレーションを定義：Taskクラスは一つのUserに属する
    public function user(){
        return $this->belongsTo(User::class);
    }

}
