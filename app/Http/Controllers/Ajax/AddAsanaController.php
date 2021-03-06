<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddAsanaController extends Controller
{
    public function store(Request $request){
//        \Log::debug('ajax.store');

        //TODO アーサナの順が入れ替わった時は、保存以外のポスト(アーサナ新規作成と検索)が走った時にsessionに入れる

        $program_asanas = $request->session()->pull('program_asanas', array());
//        \Log::debug($request->session()->all());
//        \Log::debug($program_asanas);
        $program_asanas[] = $request->asana_id;
//        \Log::debug($program_asanas);

        // セッションへデータを保存する
        $request->session()->put('program_asanas', $program_asanas);

        $six_category = config('six_category');
        $posture = config('posture');
        $intensity = config('intensity');

        return response()->json([
            'program_asanas' => $program_asanas,
            'six_category' => $six_category,
            'posture' => $posture,
            'intensity' => $intensity,
        ]);
    }
}
