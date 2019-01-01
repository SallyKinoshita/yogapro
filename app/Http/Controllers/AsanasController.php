<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asana;
use App\Http\Requests;

class AsanasController extends Controller
{
    public function index(Request $request)
    {
//        $asanas = $request->asanas;
//        return view('asanas.index', ['asanas'=>$asanas->asanas]);

//        $asanas = $request->asanas;
//        return view('asanas.index')->with('asana', $asanas);

        $asanas = Asana::all();
        return view('asanas.index', ['asanas' => $asanas]);
    }

    public function create()
    {
        return view('asanas.create')->with('asana', new Asana());
    }

    public function store(Request $request)
    {
        $asana = new Asana();
        $asana->fill($request->all());
        $asana->save();
        return redirect()->route('asanas.index');
    }

    public function show($id)
    {
        $asana = Asana::find($id);
        return view('asanas.show')->with('asana', $asana);
    }

    public function edit($id)
    {
        $asana = Asana::find($id);
        return view('asanas.edit')->with('asana', $asana);
    }

    public function update(Request $request, $id)
    {
        $asana = Asana::find($id);
        $asana->fill($request->all());
        $asana->save();
        return redirect()->route('asanas.index');
    }

    public function destroy($id)
    {
        $asana = Asana::find($id);
        $asana->delete();
        return redirect()->route('asanas.index');
    }

}
