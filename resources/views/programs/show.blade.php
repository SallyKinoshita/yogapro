@extends('layouts.app')

@section('title', $program->name)

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $program->name }}
        </div>
        <div class="panel-body">
            <div>
                プログラム名: {{ $program->name }}
            </div>
        </div>
        <div class="panel-footer">
            {{ link_to_route('programs.index', '戻る') }}
        </div>
    </div>

@endsection