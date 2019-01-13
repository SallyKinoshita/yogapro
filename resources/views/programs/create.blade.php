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
                        {!! Form::label('name', 'プログラム名(必須)', ['class' => 'col-sm-9 control-label']) !!}
                        {!! Form::text('name', $program->name, ['id' => 'program_name', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('tag', 'タグ', ['class' => 'col-sm-3 control-label', 'style' => 'max-width:100%;']) !!}
                        {!! Form::text('tag', $program->tag, ['id' => 'program_tag', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        {!! Form::label('description', 'プログラム説明', ['class' => 'col-sm-9 control-label', 'style' => 'margin:10px 0;']) !!}
                        {!! Form::text('description', $program->description, ['id' => 'program_description', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-sm-3">
                        {!! Form::label('time', '想定時間(分)', ['class' => 'col-sm-3 control-label', 'style' => 'max-width:100%;margin:10px 0']) !!}
                        {!! Form::text('time', $program->time, ['id' => 'program_time', 'class' => 'form-control']) !!}
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
                        <tbody id="program_asana_table">
                        {{--@foreach ($program_asanas as $index => $asana_id)--}}
                            {{--<tr>--}}
                                {{--<td>--}}
                                    {{--{{$index+1}}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{$all_asanas[$asana_id-1]['name']}}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{ config('six_category')[$all_asanas[$asana_id-1]['six_category']] }}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{ config('posture')[$all_asanas[$asana_id-1]['posture']] }}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{ config('intensity')[$all_asanas[$asana_id-1]['intensity']] }}--}}
                                {{--</td>--}}
                                {{--<td class="table-text">--}}
                                    {{--{{$all_asanas[$asana_id-1]['description']}}--}}
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
                            <tbody id="all_asana_table">
                                @foreach ($all_asanas as $asana)
                                    <tr>
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
        var all_asanas = <?php echo $all_asanas;?>;
    </script>
@endsection