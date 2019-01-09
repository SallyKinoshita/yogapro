@extends('layouts.app')

@section('title', 'プログラム一覧')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">プログラム一覧</h3>
            <a href="{{ url('/programs/create') }}" class="btn btn-primary btn-lg active" role="button" style="margin:10px;">新規作成</a>
            <a href="{{ url('/asanas/') }}" class="btn btn-success active" role="button" style="float:right;margin:10px;">アーサナ一覧を開く</a>
        </div>
        <div class="panel-body">
            <table class="table table-striped program-table">
                <thead>
                <th>プログラム名</th>
                <th>タグ</th>
                <th>説明</th>
                <th>想定時間(分)</th>
                <th>編集</th>
                <th>削除</th>
                </thead>
                <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td class="table-text">
                            {{ link_to_route('programs.show', $program->name, $program->id) }}
                        </td>
                        <td class="table-text">
                            {{ $program->tag }}
                        </td>
                        <td class="table-text">
                            {{ $program->description }}
                        </td>
                        <td class="table-text">
                            {{ $program->time }}
                        </td>
                        <td class="table-text">
                            {{ link_to_route('programs.edit', '編集', $program->id, ['class' => 'btn btn-sm btn-default']) }}
                        </td>
                        <td class="table-text">
                            {{ Form::open(['route' => ['programs.destroy', $program->id], 'method' => 'delete']) }}
                            {{ Form::hidden('id', $program->id) }}
                            {{ Form::submit('削除', ['class' => 'btn btn-sm btn-default']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

{{--@section('endbody')--}}
{{--@parent--}}
{{--<script>--}}
    {{--// window.onload = function(){--}}
    {{--//     alert('js');--}}
    {{--// }--}}
    {{--// $(function() {--}}
    {{--//     alert('jquery');--}}
    {{--// });--}}
{{--    <script src="{{ asset('js/script.js') }}" defer></script>--}}
    {{--// require('../../public/js/script');--}}
{{--// </script>--}}
{{--@stop--}}