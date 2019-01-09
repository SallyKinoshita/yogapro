@extends('layouts.app')

@section('title', '新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>プログラム新規作成</h3>
                {!! Form::model($program, ['route' => 'programs.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
                <div class="row">
                    <div class="col-sm-9">
                        {!! Form::label('program_name', 'プログラム名(必須)', ['class' => 'col-sm-9 control-label']) !!}
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
                        {!! Form::label('program_time', '想定時間(分)', ['class' => 'col-sm-3 control-label', 'style' => 'max-width:100%;margin:10px 0']) !!}
                        {!! Form::text('program_time', $program->time, ['id' => 'program_time', 'class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::label('program_contents', 'プログラム内容(必須)', ['class' => 'col-sm-8 control-label', 'style' => 'margin:10px 0;display:inline-block;']) !!}
                {!! Form::button('<i class="fa fa-save"></i> 保存', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'float:right;margin:10px;display:inline-block;']) !!}
                <div class="panel-body">
                    <table class="table table-striped program-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>アーサナ名</th>
                                <th>6種別</th>
                                <th>体位</th>
                                <th>強度</th>
                                <th>説明</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            </tr>
                        {{--新規作成の場合は、ここはこのままで良いのか--}}
                            <?php //$cnt = 0;?>
                            {{--@foreach ($asanas as $asana)--}}
                            <?php //$cnt++;?>
                            {{--<tr>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{$cnt}}--}}
                                {{--</td>--}}
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
                    {!! Form::close() !!}
                </div>
            <div class="panel-footer">
                {{ link_to_route('programs.index', '戻る') }}
            </div>
        </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="display: inline-block;">アーサナ一覧</h3>
                        <a href="{{ url('/asanas/create') }}" class="btn btn-success active" role="button" style="margin:0 10px 10px 0;float:right;">アーサナ新規作成</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped program-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>アーサナ名</th>
                                    <th>6種別</th>
                                    <th>体位</th>
                                    <th>強度</th>
                                    <th>説明</th>
                                </tr>
                            </thead>
                            <tbody id="asana_list">
                            @foreach ($asanas as $asana)
                                <tr draggable="true" ondragstart="f_dragstart(event)">
                                    <td>
                                        {!! Form::button('+', ['type' => 'button', 'id' => 'add_'.$asana->id,
                                            'class' => 'btn btn-default', 'style' => 'font-weight:bold;background-color:white;border:solid 1px #CCC;']) !!}
                                    </td>
                                    <td class="table-text">
                                        {{$asana->name}}
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
                                        {{$asana->description}}
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
    <script>
    </script>
@endsection