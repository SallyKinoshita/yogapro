@extends('layouts.app')

@section('title', 'アーサナ一覧')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">アーサナ一覧</h3>
            <a href="{{ url('/asanas/create') }}" class="btn btn-primary btn-lg active" role="button" style="margin:10px;">新規作成</a>
            <a href="{{ url('/programs/') }}" class="btn btn-success active" role="button" style="float:right;margin:10px;">プログラム一覧を開く</a>
        </div>
        <div class="panel-body">
            <table class="table table-striped program-table">
                <thead>
                    <th>アーサナ名</th>
                    <th>6種別</th>
                    <th>体位</th>
                    <th>強度</th>
                    <th>説明</th>
                    <th>編集</th>
                    <th>削除</th>
                </thead>
                <tbody>
                    @foreach ($asanas as $asana)
                        <tr>
                            <td class="table-text">
                                {{ link_to_route('asanas.show', $asana->name, $asana->id) }}
                            </td>
                            <td class="table-text">
                                {{ $asana->six_category }}
                            </td>
                            <td class="table-text">
                                {{ $asana->posture }}
                            </td>
                            <td class="table-text">
                                {{ $asana->intensity }}
                            </td>
                            <td class="table-text">
                                {{ $asana->desctiption }}
                            </td>
                            <td class="table-text">
                                {{ link_to_route('asanas.edit', '編集', $asana->id, ['class' => 'btn btn-sm btn-default']) }}
                            </td>
                            <td class="table-text">
                                {{ Form::open(['route' => ['asanas.destroy', $asana->id], 'method' => 'delete']) }}
                                {{ Form::hidden('id', $asana->id) }}
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