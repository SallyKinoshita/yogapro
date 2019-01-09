
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$('button[id*=add_]').click(function(){
    let asana_id = this.id.replace('add_','');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    $.ajax({
        type:"POST",
        url:"AddAsanaController",
        data: {
            program_id : program_id,//TODO 新規作成の場合は？更新の場合もどうやってこのID渡す？
            asana_id : asana_id
        },
        // processData: false,
        // contentType: false,
        // async: false,
        success : function(json) {
            //TODO　取得したidをもとにテーブル再構成
            console.log(json);
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
        }
    });
}