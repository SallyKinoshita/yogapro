@extends('layouts.app')

@section('title', $program->name)

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>{{ $program->name }}</h3>
        </div>
        <div class="panel-body">
            <div>
                プログラム名: {{ $program->name }}
            </div>
            <div>
                タグ: {{ $program->tag }}
            </div>
            <div>
                プログラム説明: {{ $program->description }}
            </div>
            <div>
                想定時間: {{ $program->time }}
            </div>
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
                <tbody id="asana_list">
                <?php $cnt = 0;?>
                @foreach ($asanas as $asana)
                    <?php $cnt++;?>
                    <tr class="item" id="{{$asana->id}}">
                        <td class="table-text">
                            {{$cnt}}
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
        <div class="panel-footer">
            {{ link_to_route('programs.index', '戻る') }}
        </div>
    </div>

@endsection