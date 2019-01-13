
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
        url:"add_asana",
        data: {
            asana_id : asana_id
        },
        // processData: false,
        // contentType: false,
        // async: false,
        success : function(json) {
            // console.log(json);
            // console.log(all_asanas);
            // console.log(json.program_asanas);
            // console.log(json.six_category);
            // console.log(json.posture);
            // console.log(json.intensity);
            $('#program_asana_table').empty();
            for(let i = 0;i<=json.program_asanas.length;i++){
                // alert("loop:"+i);
                let index = Number(json.program_asanas[i])-1;
                let description = "";
                if(all_asanas[index]['description']!==null){
                    description = all_asanas[index]['description'];
                }
                // alert("index:"+index);
                $('#program_asana_table').append('<tr>' +
                    '<td class="table-text">' +
                    (i+1) +
                    '</td>' +
                    '<td class="table-text">'+
                    all_asanas[index]['name'] +
                    '</td>' +
                    '<td class="table-text">' +
                    json.six_category[all_asanas[index]['six_category']] +
                    '</td>' +
                    '<td class="table-text">' +
                    json.posture[all_asanas[index]['posture']] +
                    '</td>' +
                    '<td class="table-text">' +
                    json.intensity[all_asanas[index]['intensity']] +
                    '</td>' +
                    '<td class="table-text">' +
                    description +
                    '</td></tr>');
            }
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
        }
    });
});