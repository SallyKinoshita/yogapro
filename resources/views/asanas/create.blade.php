@extends('layouts.app')

@section('title', '新規作成')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            新規作成
        </div>
        <div class="panel-body">
            <form action="{{ url('asanas') }}" method="post">
                <div>
                    {!! Form::label('asana_name', 'アーサナ名', ['class' => 'col-sm-9 control-label']) !!}
                    {!! Form::text('asana_name', $asana->name, ['id' => 'asana_name', 'class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::label('six_category', '6種別', ['class' => 'col-sm-9 control-label']) !!}
                    {!! Form::text('six_category', $asana->six_category, ['id' => 'six_category', 'class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::label('posture', '体位', ['class' => 'col-sm-9 control-label']) !!}
                    {!! Form::text('posture', $asana->posture, ['id' => 'posture', 'class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::label('intensity', '強度', ['class' => 'col-sm-9 control-label']) !!}
                    {!! Form::text('intensity', $asana->intensity, ['id' => 'intensity', 'class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::label('asana_description', 'アーサナ説明', ['class' => 'col-sm-9 control-label']) !!}
                    {!! Form::text('asana_description', $asana->description, ['id' => 'asana_description', 'class' => 'form-control']) !!}
                </div>
                <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </form>
        </div>
        <div class="panel-footer">
            {{ link_to_route('asanas.index', '戻る') }}
        </div>
    </div>

@endsection