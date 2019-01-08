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

    public function create()
    {
        $asanas = Asana::all();
        return view('programs.create')->with(['program' => new Program(),'asanas' => $asanas,]);
    }

    public function store(Request $request)
    {
        $program = new Program();
        $program->user_id = $request->user()->id;
        $program->fill($request->all());
        $program->save();
        if (is_array($request->asanas)) {
            $program->asanas()->detach(); //登録済みのアーサナを全て削除
            $program->asanas()->attach($request->asanas); //改めて登録　TODO 順番は要らない？
        }
        return redirect()->route('programs.index');
    }

    public function show($id)
    {
        $program = Program::find($id);
        $asanas = $program->asanas()->orderBy('order')->get();
        return view('programs.show')->with(['program' => $program,'asanas' => $asanas,]);
    }

    public function edit($id)
    {
        $program = Program::find($id);
        $asanas = Asana::all();
        return view('programs.edit')->with(['program' => $program,'asanas' => $asanas,]);
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        $program->fill($request->all());
        $program->save();
        if (is_array($request->asanas)) {
            $program->asanas()->detach(); //登録済みのアーサナを全て削除
            $program->asanas()->attach($request->asanas); //改めて登録　TODO 順番は要らない？
        }
//         $program->asanas()->sync($request->asanas());
        return redirect()->route('programs.index');
    }

    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect()->route('programs.index');
    }
}
