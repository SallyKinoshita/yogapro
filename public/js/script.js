
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

function programAsanaAppend(json,edit){
    // alert('success');
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
            '</td>' +
            // '<td class="table-text">' +
            // '<button type="button" id="'+i+'" class="btn btn-default btn-row btn'+edit+'-up">↑</button>'+
            // '</td>' +
            // '<td class="table-text">' +
            // '<button type="button" id="'+i+'" class="btn btn-default btn-row btn'+edit+'-down">↓</button>'+
            // '</td>' +
            '<td class="table-text">' +
            '<button type="button" id="'+i+'" class="btn btn-default btn-row btn'+edit+'-remove">-</button>'+
            '</td>' +
            '</tr>');
    }
}
$('.btn-add').on('click', function(){
    // var id =  $(this).attr("id");
    // alert('add');
    let asana_id = $(this).attr('id');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    // alert(asana_id);
    $.ajax({
        type:"POST",
        url:"add_asana",
        data: {
            asana_id : asana_id
        },
        success : function(json) {
            // alert('success');
            programAsanaAppend(json,"");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
        }
    });
});
$(document).on("click", ".btn-edit-add",function(){
        // alert('edit');
    let asana_id = this.id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    // alert(asana_id);
    $.ajax({
        type:"POST",
        url:"../add_asana",
        data: {
            asana_id : asana_id
        },
        success : function(json) {
            // alert('success');
            programAsanaAppend(json,"-edit");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
        }
    });
});
$(document).on("click", ".btn-remove",function(){
        // alert('remove');
    let index = this.id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    // alert(index);
    $.ajax({
        type:"POST",
        url:"remove_asana",
        data: {
            index : index
        },
        success : function(json) {
            // alert('success');
            programAsanaAppend(json,"");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
        }
    });
});
$(document).on("click", ".btn-edit-remove",function(){
    // alert('edit-remove');
    let index = this.id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    // alert(index);
    $.ajax({
        type:"POST",
        url:"../remove_asana",
        data: {
            index : index
        },
        success : function(json) {
            // alert('success');
            programAsanaAppend(json,"-edit");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
        }
    });
});
$(document).on("click", ".btn-up",function(){
    let data = [];
    data['index'] = this.id;
    data['up_or_down'] = "up";
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });
    // alert(index);
    $.ajax({
        type:"POST",
        url:"sort_asana",
        data: {
            data : data,
        },
        success : function(json) {
            alert('success');
            programAsanaAppend(json,"");
        },
        error : function(XMLHttpRequest, textStatus, errorThrown) {
            alert("エラーが発生しました：" + textStatus + ":\n" + errorThrown);
        }
    });
});