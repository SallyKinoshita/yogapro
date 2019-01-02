@extends('layouts.app')

@section('title', "$asana->nameの編集")

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $asana->name }}の編集
        </div>
        <div class="panel-body">
            {!! Form::model($asana, ['route' => ['asanas.update', $asana->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('name', 'アーサナ名', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', $asana->name, ['id' => 'asana_name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('six_category', '6種別', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::select('six_category', config('six_category'), $asana->six_category, ['id' => 'six_category', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('posture', '体位', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::select('posture',config('posture'), $asana->posture, ['id' => 'posture', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('intensity', '強度', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-2">
                    {!! Form::select('intensity',config('intensity'), $asana->intensity, ['id' => 'intensity', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', '説明', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('description', $asana->description, ['id' => 'description', 'class' => 'form-control', 'size' => '30x5']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::button('<i class="fa fa-save"></i> 保存', ['type' => 'submit', 'class' => 'btn btn-default']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="panel-footer">
            {{ link_to_route('asanas.index', '戻る') }}
        </div>
    </div>

@endsection