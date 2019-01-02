@extends('layouts.app')

@section('title', $asana->name)

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $asana->name }}
        </div>
        <div class="panel-body">
            <div>
                アーサナ名: {{ $asana->name }}
            </div>
            <div>
                6種別: {{ config('six_category')[$asana->six_category] }}

            </div>
            <div>
                体位: {{ config('posture')[$asana->posture] }}
            </div>
            <div>
                強度: {{ config('intensity')[$asana->intensity] }}
            </div>
            <div>
                説明: {{ $asana->description }}
            </div>
        </div>
        <div class="panel-footer">
            {{ link_to_route('asanas.index', '戻る') }}
        </div>
    </div>

@endsection