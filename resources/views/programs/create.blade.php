@extends('layouts.app')

@section('title', '新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>プログラム新規作成</h3>
                <div class="row">
                    <div class="col-sm-9">
                        {!! Form::label('program_name', 'プログラム名', ['class' => 'col-sm-9 control-label']) !!}
                        {!! Form::text('program_name', $program->name, ['id' => 'program_name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('program_tag', 'タグ', ['class' => 'col-sm-3 control-label', 'style' => 'max-width:100%;']) !!}
                        {!! Form::text('program_tag', $program->tag, ['id' => 'program_tag', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        {!! Form::label('program_description', 'プログラム説明', ['class' => 'col-sm-9 control-label', 'style' => 'margin:10px 0;']) !!}
                        {!! Form::text('program_description', $program->description, ['id' => 'program_description', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('program_time', '想定時間', ['class' => 'col-sm-3 control-label', 'style' => 'max-width:100%;margin:10px 0']) !!}
                        {!! Form::text('program_time', $program->time, ['id' => 'program_time', 'class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::label('program_contents', 'プログラム内容', ['class' => 'col-sm-12 control-label', 'style' => 'margin:10px 0;']) !!}
                <div class="panel-body">
                    <table class="table table-striped program-table">
                        <thead>
                        <th>アーサナ名</th>
                        <th>6種別</th>
                        <th>体位</th>
                        <th>強度</th>
                        <th>説明</th>
                        </thead>
                        <tbody>
                        {{--新規作成の場合は、ここはこのままで良いのか--}}
                        {{--@foreach ($asanas as $asana)--}}
                            {{--<tr>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{ link_to_route('asanas.show', $asana->name, $asana->id) }}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{ config('six_category')[$asana->six_category] }}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{ config('posture')[$asana->posture] }}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{ config('intensity')[$asana->intensity] }}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{ $asana->description }}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">アーサナ一覧</h3>
                        <a href="{{ url('/asanas/create') }}" class="btn btn-primary active" role="button" style="margin:10px;float:right;">アーサナ新規作成</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped program-table">
                            <thead>
                            <th>アーサナ名</th>
                            <th>6種別</th>
                            <th>体位</th>
                            <th>強度</th>
                            <th>説明</th>
                            </thead>
                            <tbody>
                            @foreach ($asanas as $asana)
                                <tr>
                                    <td class="table-text">
                                        {{ $asana->name　}}
                                        {{--idってhiddenで持っとくのか？？--}}
                                        {{--{{ link_to_route('asanas.show', $asana->name, $asana->id) }}--}}
                                    </td>
                                    <td class="table-text">
                                        {{ config('six_category')[$asana->six_category] }}
                                    </td>
                                    <td class="table-text">
                                        {{ config('posture')[$asana->posture] }}
                                    </td>
                                    <td class="table-text">
                                        {{ config('intensity')[$asana->intensity] }}
                                    </td>
                                    <td class="table-text">
                                        {{ $asana->description }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection