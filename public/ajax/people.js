/**
 * Created by qning on 2018/1/10.
 */
$(document).ready(function(){
    $('#showStuInfo').on('click','#id_stuSave',function(){
        var weekNum=$("input[name=week]:checked").val();
        var chooseId='';
        switch (weekNum){
            case 'week_1':
                chooseId='alreadyWeek_1';
                break;
            case 'week_2':
                chooseId='alreadyWeek_2';
                break;
            case 'week_3':
                chooseId='alreadyWeek_3';
                break;
            case 'week_4':
                chooseId='alreadyWeek_4';
                break;
            case 'week_5':
                chooseId='alreadyWeek_5';
                break;
            case 'week_6':
                chooseId='alreadyWeek_6';
                break;
            case 'week_7':
                chooseId='alreadyWeek_7';
                break;
            default:
                alert('错误：星期几 单选框必须选择一个');
                return;
        }
        var i=0;
        $.each($('input[name=name_stuInfo]:checked'),function(){
            var j=weekNum.substr(weekNum.length-1,1)-1;
            var m=j+1;
            var valStr='<div style="float: left;margin-right: 5px" id="id_new_week_'+m+'_X_div'+i+'">' +
                            '<input type="checkbox" class="input-small" id="id_new_week_'+m+'_X_div'+i+'" name="'+weekNum+'[]" value="'+$(this).attr("value_id")+'" style="display: none" checked />' +
                            '<span class="label label-info" data-toggle="tooltip" title="学号:'+$(this).attr("value_card")+'">'+$(this).attr("value_name")+'&nbsp;' +
                                '<a class="text-danger" style="text-decoration: none;cursor: pointer" data-toggle="tooltip" title="点击删除" onclick="dealWithX('+j+','+i+',\'flagNew\')">' +
                                    '<span class="glyphicon glyphicon-trash"></span>' +
                                '</a>' +
                            '</span>' +
                        '</div>';
            $('#'+chooseId).append(valStr);
            i++;
        });
    });


    /*javascript结合的ajax，能简化成下面的jquery结合的ajax*/
    $('#id_stuSearch').keyup(function(){
        var tmpStr=$(this).val();
        $.get("stuInfo/"+tmpStr,function(data,status){
            $('#showStuInfo').html(data);
        });
    });
});

/*input取消checked，同时整个div元素删掉*/
function dealWithX(j,i,flag=''){
    if(flag=='flagNew'){
        var idStrInput='id_new_week_'+(j+1)+'_X_input'+i;
        var idStrDiv='id_new_week_'+(j+1)+'_X_div'+i;
        $('#'+idStrInput).removeAttr("checked");
        $('#'+idStrDiv).remove();
    }else if(flag=='flagAdd'){
        var idStrInput='id_choose_input_'+j+'_'+i;
        var idStrDiv='id_choose_div_'+j+'_'+i;
        var idStrButton='id_button_'+j+'_'+i;
        $('#'+idStrInput).removeAttr("checked");
        $('#'+idStrDiv).remove();
        $('#'+idStrButton).remove();
        $('.class_add').show();
    }else if(flag=='flagNewChoose'){
        var idStrInput='id_week_'+(j+1)+'_chooseX_input_'+i;
        var idStrDiv='id_week_'+(j+1)+'_chooseX_div_'+i;
        $('#'+idStrInput).removeAttr("checked");
        $('#'+idStrDiv).remove();
    }else {
        var idStrInput='id_week_'+(j+1)+'_X_input'+i;
        var idStrDiv='id_week_'+(j+1)+'_X_div'+i;
        $('#'+idStrInput).removeAttr("checked");
        $('#'+idStrDiv).remove();
    }
}

function formSubmit(id_button){
    $("form").submit();
}

/*预约试听，点击+会给用户排课*/
function dealWithAdd(schId,weekNum,orderId,orderName,orderSubject){
    var idStrForm='id_choose_form_'+schId+'_'+weekNum;
    var elemendOrderStr=
        '<br />'+
        '<div class="center-block" style="float: left;margin-right: 5px" id="id_choose_div_'+schId+'_'+weekNum+'">' +
            '<input type="radio" class="input-small" id="id_choose_input_'+schId+'_'+weekNum+'" name="chooseSubject[position]" value="'+schId+'_'+weekNum+'" style="display: none" checked />' +
            '<span class="label glyphicon glyphicon-fire" style="background-color: #f1a118" data-toggle="tooltip" title="预约科目:'+orderSubject+'">'+orderName+'&nbsp;' +
                '<a class="text-danger" style="text-decoration: none;cursor: pointer" data-toggle="tooltip" title="点击删除，删除后可以重新选" onclick="dealWithX('+schId+','+weekNum+',\'flagAdd\')">' +
                    '<span class="glyphicon glyphicon-trash"></span>' +
                '</a>' +
            '</span>' +
        '</div>';
    var elemendSaveStr='<br /><button style="float: right;margin-top: 5px;margin-bottom: 0px" id="id_button_'+schId+'_'+weekNum+'" class="btn btn-danger btn-xs" onclick="formSubmit(this.id)">确定</button>';
    $('#'+idStrForm).append(elemendOrderStr);
    $('#'+idStrForm).append(elemendSaveStr);
    $('.class_add').hide();
}


