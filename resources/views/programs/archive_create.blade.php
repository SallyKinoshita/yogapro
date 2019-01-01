@extends('layouts.app')

@section('title', '新規作成')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            新規作成
        </div>
        <div class="panel-body">
            {!! Form::model($program, ['route' => 'programs.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('name', 'プログラム名', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', $program->name, ['id' => 'program-name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('tag', 'タグ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('tag', $program->tag, ['id' => 'program-tag', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', '説明', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('description', $program->description, ['id' => 'program-description', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('time', '時間', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('time', $program->time, ['id' => 'program-time', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::submit('プログラム追加', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="panel-footer">
            {{ link_to_route('programs.index', '戻る') }}
        </div>
    </div>

@endsection