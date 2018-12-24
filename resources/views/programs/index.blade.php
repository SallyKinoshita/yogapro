@extends('layouts.app')

@section('title', 'プログラム一覧')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            プログラム一覧
        </div>
        <div class="panel-body">
            <table class="table table-striped program-table">
                <thead>
                <th>プログラム名</th>
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