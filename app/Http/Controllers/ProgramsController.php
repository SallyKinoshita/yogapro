<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Http\Requests;

class ProgramsController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('updated_at', 'desc')->get();
        return view('programs/index')->with('programs', $programs);
    }

    public function create()
    {
        return view('programs/create')->with('program', new Program());
    }

    public function store(Request $request)
    {
        $task = new Program();
        $task->fill($request->all());
        $task->save();
        return redirect()->route('programs.index');
    }

    public function show($id)
    {
        $program = Program::find($id);
        return view('programs/show')->with('program', $program);
    }

    public function edit($id)
    {
        $program = Program::find($id);
        return view('programs/edit')->with('program', $program);
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
