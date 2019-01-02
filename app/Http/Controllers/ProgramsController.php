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
        return redirect()->route('programs.index');
    }

    public function show($id)
    {
        $program = Program::find($id);
        return view('programs.show')->with('program', $program);
    }

    public function edit($id)
    {
        $program = Program::find($id);
        return view('programs.edit')->with('program', $program);
    }

    public function update(Request $request, $id)
    {
        $program = Program::find($id);
        $program->fill($request->all());
        $program->save();
        return redirect()->route('programs.index');
    }

    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect()->route('programs.index');
    }
}
