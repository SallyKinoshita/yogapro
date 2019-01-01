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
            <div>
                タグ: {{ $program->tag }}
            </div>
            <div>
                プログラム説明: {{ $program->description }}
            </div>
            <div>
                想定時間: {{ $program->time }}
            </div>
            <div>
                内容: {{ $program->contents }}
                {{--TODO 表示の仕方は要検討--}}
            </div>
        </div>
        <div class="panel-footer">
            {{ link_to_route('programs.index', '戻る') }}
        </div>
    </div>

@endsection