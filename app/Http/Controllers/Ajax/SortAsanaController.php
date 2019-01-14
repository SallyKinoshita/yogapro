<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SortAsanaController extends Controller
{
    public function store(Request $request)
    {
        $six_category = config('six_category');
        $posture = config('posture');
        $intensity = config('intensity');
        //        \Log::debug($request->session()->all());
        $program_asanas = $request->session()->get('program_asanas', array());
        \Log::debug($program_asanas);
        \Log::debug($request->data);
        //TODO ここで値取れない
        \Log::debug('1');
        $up_or_down = $request->data['up_or_down'];
        $index = $request->data['index'];

//        if($up_or_down == "up"&&$index==0 || $up_or_down == "down"&&$index==(count($program_asanas)-1)){
//            return response()->json([
//                'program_asanas' => $program_asanas,
//                'six_category' => $six_category,
//                'posture' => $posture,
//                'intensity' => $intensity,
//            ]);
//        }
        \Log::debug('2');

        $target = $program_asanas[$index];
        unset($program_asanas[$index]);
        if($up_or_down == "up"){
            $move = $program_asanas[($index-1)];
            unset($program_asanas[($index-1)]);
            $program_asanas[$index] = $move;
            $program_asanas[($index-1)] = $target;
        }else{
            $move = $program_asanas[($index+1)];
            unset($program_asanas[($index+1)]);
            $program_asanas[$index] = $move;
            $program_asanas[($index+1)] = $target;
        }
    //        \Log::debug($program_asanas);
        \Log::debug('3');

        // セッションへデータを保存する
        $request->session()->put('program_asanas', $program_asanas);

        return response()->json([
            'program_asanas' => $program_asanas,
            'six_category' => $six_category,
            'posture' => $posture,
            'intensity' => $intensity,
        ]);
    }
}
