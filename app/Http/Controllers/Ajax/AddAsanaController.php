<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Asana;

class AddAsanaController extends Controller
{
    public function store(Request $request){

        if($request->program_id){
            $program = Program::find($request->program_id);
        }else{
            $program = new Program();
        }
        //TODO 中間テーブルに追加
        if ($request->asana_id) {//TODO 違う単語にして、asanaとorderの連想配列でも良い
            $program->asanas()->attach($request->asana_id); //TODO 順番は要らない？入れるとするとforeach回す
//            $user->roles()->attach($roleId, ['expires' => $expires]);　こんな感じで追加カラムに挿入できる
        }

        return response()->json([
            //TODO 中間テーブルの内容を返す　order順or orderも
            'result' => true
        ]);

    }
}
