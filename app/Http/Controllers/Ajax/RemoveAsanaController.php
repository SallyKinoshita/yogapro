<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemoveAsanaController extends Controller
{
    public function store(Request $request)
    {
        //        \Log::debug($request->session()->all());
        $program_asanas = $request->session()->pull('program_asanas', array());
//                \Log::debug($program_asanas);
        array_splice($program_asanas,$request->index,1);
//                \Log::debug($program_asanas);

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
