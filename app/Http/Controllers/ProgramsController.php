<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Asana;
use App\Http\Requests;

class ProgramsController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $programs = $user->load('programs');
        return view('programs.index', ['programs'=>$programs->programs]);

//        $programs = $request->user()->programs;
//        return view('programs.index')->with('program', $programs);
    }

    public function create(Request $request)
    {
        $all_asanas = Asana::all();
        $request->session()->forget('program_asanas');
//        $program_asanas = $request->session()->get('program_asanas', array());
//        return view('programs.create')->with(['program' => new Program(),'program_asanas' => $program_asanas,'all_asanas' => $all_asanas,]);
        return view('programs.create')->with(['program' => new Program(),'all_asanas' => $all_asanas,]);
    }

    public function store(Request $request)
    {
        $program = new Program();
        $program->user_id = $request->user()->id;
        $program->fill($request->all());
        $program->save();
//        \Log::debug($request->session()->all());
        if ($request->session()->get('program_asanas')) {
            $program->asanas()->detach(); //登録済みのアーサナを全て削除
            $program->asanas()->attach($request->session()->get('program_asanas'));
        }
        $request->session()->forget('program_asanas');
        return redirect()->route('programs.index');
    }

    public function show($id)
    {
        $program = Program::find($id);
        $asanas = $program->asanas()->withPivot('order_id')->orderBy('order_id')->get();
        return view('programs.show')->with(['program' => $program,'asanas' => $asanas,]);
    }

    public function edit(Request $request, $id)
    {
        $program = Program::find($id);
        $all_asanas = Asana::all();
        $program_asanas = $program->asanas()->withPivot('order_id')->orderBy('order_id')->get();//TODO これだとasana型になってしまう
        $program_asanas_for_session = Array();
        foreach ($program_asanas as $index => $value){
            $program_asanas_for_session[$index] = $value['id'];
        }
        $request->session()->put('program_asanas', $program_asanas_for_session);
        return view('programs.edit')->with(['program' => $program,'all_asanas' => $all_asanas,'program_asanas' => $program_asanas,]);
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        $program->fill($request->all());
        $program->save();
//        \Log::debug($request->session()->all());
        if ($request->session()->get('program_asanas')) {
            $program->asanas()->detach(); //登録済みのアーサナを全て削除
            $program->asanas()->attach($request->session()->get('program_asanas'));
        }
        $request->session()->forget('program_asanas');
        return redirect()->route('programs.index');
    }

    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect()->route('programs.index');
    }
}
