@extends('layouts.app')

@section('title', '新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6" style="background-color:red;">
                <div class="row">
                    <div class="col-sm-9">
                        {!! Form::label('program_name', 'プログラム名', ['class' => 'col-sm-9 control-label']) !!}
                        {!! Form::text('program_name', $program->name, ['id' => 'program_name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('program_tag', 'タグ', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::text('program_tag', $program->tag, ['id' => 'program_tag', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        {!! Form::label('program_description', 'プログラム説明', ['class' => 'col-sm-9 control-label']) !!}
                        {!! Form::text('program_description', $program->description, ['id' => 'program_description', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('program_time', '想定時間', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::text('program_time', $program->time, ['id' => 'program_time', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <table class="table table-striped program-table">
                        <thead>
                        <th>プログラム名</th>
                        <th>タグ</th>
                        <th>説明</th>
                        <th>時間</th>
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
            <div class="col-sm-6" style="background-color:blue;">
                <div class="row">
                    <h3>アーサナ検索</h3>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {{--{!! Form::label('asana_name', 'アーサナ名', ['class' => 'col-sm-12 control-label']) !!}--}}
                        {{--{!! Form::text('asana_name', $asana->name, ['id' => 'asana_name', 'class' => 'form-control']) !!}--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        {{--{!! Form::label('tag', 'タグ', ['class' => 'col-sm-2 control-label']) !!}--}}
                        {{--{!! Form::text('tag', $program->tag, ['id' => 'program_tag', 'class' => 'form-control']) !!}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection