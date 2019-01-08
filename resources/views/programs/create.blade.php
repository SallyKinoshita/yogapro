@extends('layouts.app')

@section('title', '新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>プログラム新規作成</h3>
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
                        {!! Form::label('program_time', '想定時間', ['class' => 'col-sm-3 control-label', 'style' => 'max-width:100%;margin:10px 0']) !!}
                        {!! Form::text('program_time', $program->time, ['id' => 'program_time', 'class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::label('program_contents', 'プログラム内容(必須)', ['class' => 'col-sm-8 control-label', 'style' => 'margin:10px 0;display:inline-block;']) !!}
                {!! Form::button('<i class="fa fa-save"></i> 保存', ['type' => 'submit', 'class' => 'btn btn-primary', 'style' => 'float:right;margin:10px;display:inline-block;']) !!}
                <div class="panel-body">
                    <table class="table table-striped program-table">
                        <thead>
                            <tr>
                                <th>アーサナ名</th>
                                <th>6種別</th>
                                <th>体位</th>
                                <th>強度</th>
                                <th>説明</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" id="dropzone" class="dropzone"></td>
                                {{--<td id="dropbox" dropzone="copy" ondragover="f_dragover(event)" ondrop="f_drop(event)" style="background-color: #0000F0;height:400px;  -khtml-user-drag: element;"></td>--}}
                            </tr>
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
                    {{--<div id="dropbox" dropzone="copy" ondragover="f_dragover(event)" ondrop="f_drop(event)" style="background-color: #0000F0;height:400px;  -khtml-user-drag: element;">--}}
                    {{--</div>--}}
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
                                    <th>アーサナ名</th>
                                    <th>6種別</th>
                                    <th>体位</th>
                                    <th>強度</th>
                                    <th>説明</th>
                                </tr>
                            </thead>
                            <tbody id="asana_list">
                            {{--<tbody id="asana_list" ondragover="f_dragover(event)" ondrop="f_drop(event)">--}}
                            @foreach ($asanas as $asana)
                                <tr class="item" draggable="true" id="{{$asana->id}}">
                                {{--<tr draggable="true" ondragstart="f_dragstart(event)">--}}
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
        // /***** ドラッグ開始時の処理 *****/
        // function f_dragstart(event){
        //     //ドラッグするデータのid名をDataTransferオブジェクトにセット
        //     event.dataTransfer.setData("text", event.target.id);
        // }
        //
        // /***** ドラッグ要素がドロップ要素に重なっている間の処理 *****/
        // function f_dragover(event){
        //     //dragoverイベントをキャンセルして、ドロップ先の要素がドロップを受け付けるようにする
        //     event.preventDefault();
        // }
        //
        // /***** ドロップ時の処理 *****/
        // function f_drop(event){
        //     //ドラッグされたデータのid名をDataTransferオブジェクトから取得
        //     var id_name = event.dataTransfer.getData("text");
        //     //id名からドラッグされた要素を取得
        //     var drag_elm =document.getElementById(id_name);
        //     //ドロップ先にドラッグされた要素を追加
        //     event.currentTarget.appendChild(drag_elm);
        //     //エラー回避のため、ドロップ処理の最後にdropイベントをキャンセルしておく
        //     event.preventDefault();
        // }
        {{--$(function () {--}}

            {{--// dropzoneの表示テキストを初期化--}}
            {{--initDropzone();--}}

            {{--// listテーブルのitem行が操作された時のリスナーを設定--}}
            {{--items = document.getElementById('list').getElementsByClassName('item');--}}

            {{--Array.prototype.forEach.call(items, function (item) {--}}
                {{--$(item).on('dragstart', onDragStart);--}}
                {{--$(item).on('dragend', onDragEnd);--}}
            {{--});--}}

            {{--// dropzoneのリスナーを設定--}}
            {{--var $dropzone = $('#dropzone')--}}
                {{--.on('dragover', onDragOver)--}}
                {{--.on('dragenter', onDragEnter)--}}
                {{--.on('dragleave', onDragLeave)--}}
                {{--.on('drop', onDrop);--}}


            {{--// dropzoneの表示テキストを指定--}}
            {{--function initDropzone() {--}}
                {{--$('#dropzone').text("ここにドロップできます。");--}}
            {{--}--}}

            {{--function startDropzone() {--}}
                {{--$('#dropzone').text("ドラッグ中。");--}}
            {{--}--}}

            {{--function endDropzone(name) {--}}
                {{--$('#dropzone').text(name + "をドロップしました。");--}}
            {{--}--}}

            {{--// ドロップ時の処理--}}
            {{--// (1) ドロップされた行のidをPOSTする--}}
            {{--// (2) 成功したらリダイレクトする--}}
            {{--// (3) 失敗したらダイアログを表示する--}}
            {{--function doAction(id) {--}}
                {{--$.ajax({--}}
                    {{--url: "<%=  sample_add_path  %>",--}}
                    {{--type: "POST",--}}
                    {{--data: {--}}
                        {{--id: id--}}
                    {{--},--}}
                    {{--dataType: "html",--}}
                    {{--success: function (data) {--}}
                        {{--//alert("success");--}}

                        {{--// dataにドラッグ＆ドロップした--}}
                        {{--// Userのid, nameがjson形式で--}}
                        {{--// 渡される--}}
                        {{--// console.log(data);--}}
                        {{--// {"id":1,"name":"Yamada Taro"}--}}

                        {{--// 暫定的にページを再読込--}}
                        {{--location.href = "<%= sample_index_path %>"--}}
                    {{--},--}}
                    {{--error: function (data) {--}}
                        {{--alert("errror");--}}
                    {{--}--}}
                {{--});--}}
            {{--}--}}

            {{--// ドラッグ＆ドロップ操作--}}
            {{--function onDragStart(e) {--}}
                {{--var id = e.originalEvent.target.id;--}}
                {{--var name = e.originalEvent.target.cells[1].innerHTML;--}}
                {{--e.originalEvent.dataTransfer.setData('id', id);--}}
                {{--e.originalEvent.dataTransfer.setData('name', name);--}}
                {{--addDraggingEffect();--}}
                {{--startDropzone();--}}
            {{--}--}}

            {{--function onDragEnter(e) {--}}
                {{--addEnterEffect();--}}
            {{--}--}}

            {{--function onDragLeave(e) {--}}
                {{--removeEnterEffect();--}}
            {{--}--}}

            {{--function onDragOver(e) {--}}
                {{--e.preventDefault();--}}
            {{--}--}}

            {{--function onDragEnd(e) {--}}
                {{--resetAllEffect();--}}
            {{--}--}}

            {{--function onDrop(e) {--}}
                {{--e.preventDefault();--}}
                {{--var id = e.originalEvent.dataTransfer.getData('id');--}}
                {{--var name = e.originalEvent.dataTransfer.getData('name');--}}
                {{--endDropzone(name);--}}
                {{--doAction(id);--}}
            {{--}--}}

            {{--function addDraggingEffect() {--}}
                {{--$dropzone.addClass('dragging');--}}
            {{--}--}}

            {{--function removeDraggingEffect() {--}}
                {{--$dropzone.removeClass('dragging');--}}
                {{--initDropzone();--}}
            {{--}--}}

            {{--function addEnterEffect() {--}}
                {{--$dropzone.addClass('dragenter');--}}
            {{--}--}}

            {{--function removeEnterEffect() {--}}
                {{--$dropzone.removeClass('dragenter');--}}
            {{--}--}}

            {{--function resetAllEffect(e) {--}}
                {{--removeDraggingEffect();--}}
                {{--removeEnterEffect();--}}
            {{--}--}}

        {{--});--}}
    </script>
@endsection