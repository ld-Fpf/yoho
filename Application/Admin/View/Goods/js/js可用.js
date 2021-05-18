/* 
* @Author: LDF QQ 47121862
* @Date:   2014-05-19 12:17:51
* @Last Modified by:   LDF QQ 47121862
* @Last Modified time: 2014-06-23 09:14:39
*/

$(document).ready(function(){
    $('.delGoodsPic').click(function(){
    	var pid = $(this).attr('pid');
    	var _this=$(this);
    	$.post(CONTROL+'/delPic',{'pid':pid},function(data){
    		if(data){
    			$.msg({
    				str:'图片删除成功...', //默认内容
				 	timeout:2, //关闭时间
				 	shade:1, //是否有遮罩
				 	closebtn:0, //是否显示关闭按钮
				 	close:function(){
				 		_this.parent().remove();
				 	} //回调函数
    			})
    		}
    	});
    	
    })
    //增减规格
    $('#spec .addSpec').click(function() {
        var tr = $(this).parent().parent('tr').next().clone().find('input[type="hidden"]').remove().end();
        $('#spec').append(tr);
        return false;
    });
    $('#spec .delSpec').live('click',function() {
        if($('#spec tr').length>=3)
            $(this).parent('td').parent('tr').remove();
        return false;
    });
    //品牌切换
    $('#brand').change(function(){
        var u = $(this).find('option:selected').attr('pic'),
            url = ROOT+'/'+u,
            h='<img src="'+url+'" />';
        if(u)
            $('#brandLogo').html(h);
        if(!u)
            $.msg({str:'请选择品牌...',timeout:5});
    })
});

// $(function(){
//    $("#cate").change(function() {
//       $a=$(this).val();
//       $.ajax({
//           type: 'post',
//           url: postUrl + '&a=get_tid',
//           dataType: 'json',
//           data: {tid: $a},
//           success:(function(data){
//               $html="<table class='table ml10 pct90 bgwhite bdd'>/
//                                     <tr>/
//                                         <td class="tr f14 fm pct15">产地<span class="pr10"></span></td>/
//                                         <td><input type='text'></td>/
//                                     </tr>/
//                             </table>";
//           })
//       })
    
      
//    })
// })


$(function(){
    function hd_alert_test(msg) {
        hd_alert({
            message: msg,//显示内容
            timeout: 3,//显示时间
            success: function () {//这是回调函数

            }
        })
    }
    // 选择分类 cid change事件。 每次选择分类会发异步请求获取相关的品牌
    $("select[name=category_id]").change(function(){
        // 获取当前被选中的cid值
        var option      = $(":selected",this);
        var pid         = option.attr("pid");// 父级id
    
        if(pid==0){
            $(this).val("");// 重置分类下拉选项
            hd_alert_test("顶级分类不能添加商品");
            return false;
        }
        
        var category_id         = option.val();// 分类cid
        var type_id    = option.attr("type_id");// 类型tid
        // 设置隐藏域的tid 值
        $("#type_id").val(type_id);
            
            // 通过点击分类，获得对应的属性规格
            $.post(CONTROLLER+"/get_attrs", {'type_id' : type_id}, function (data) {
                if(data != 0){
                    var attr, spec, tmp;
                        attr = spec = '';
                    attr = "<table class='table1'>";
                    spec = "<table class='table1'>";
                    for (var i in data)
                    {
                        tmp  = '';
                        tmp += '<tr>';
                        tmp += '<th>' + data[i].title + '</th>';
                        tmp += '<td>';
                        if (data[i].value == '')
                        {
                            tmp += '<input type="text" name="';

                            if (data[i].attr_type == 0)
                            {
                                tmp += 'attr[' + data[i].taid +']';
                            }
                            else
                            {
                                tmp += 'spec[' + data[i].taid + '][value][]';
                            }
                            
                            tmp += '"/>';
                        }
                        else
                        {
                            if (data[i].attr_type == 0)
                            {
                                tmp += '<select class="attrs" name="';
                                tmp += 'attr[' + data[i].taid +']';
                            }
                            else
                            {
                                tmp += '<select class="attrs spec_'+data[i].taid+'" name="';
                                tmp += 'spec[' + data[i].taid + '][value][]';
                            }

                            tmp += '">';
                            tmp += '<option value="0">-请选择-</option>';
                            var opt = data[i].value.split(',');
                            var len = opt.length;
                            for (var j = 0; j < len; ++j)
                            {
                                tmp += '<option value="' + opt[j] + '">' + opt[j] + '</option>';
                            }
                            tmp += '</select></td>';
                        }
                        if (data[i].attr_type == 1)
                        {

                            tmp += '<td>附加价格 <input type="text" name="spec[' + data[i].taid +'][attr_price][]" class="spec"/></td>';
                            // 如果是下拉框，多加一个v 属性
                            if(data[i].value==''){
                                tmp += '<td><span class="add-spec btn btn-success"><i class="icon-plus icon-white"></i>添加规格</span>';
                            }else{
                                tmp += '<td><span class="add-spec btn btn-success" v='+ data[i].v_count +'><i class="icon-plus icon-white"></i>添加规格</span>';
                            }
                        }
                        tmp += '</td>';
                        tmp += '<td></td></tr>';

                        if (data[i].attr_type == 0)
                        {
                            attr += tmp;
                        }
                        else
                        {
                            spec += tmp;
                        }
                    }
                    attr+="</table>";
                    spec+="</table>";
                    $('#attr').empty().append(attr);
                    $('#spec').empty().append(spec);
                }
            else
            {
                $('#attr').empty();
                $('#spec').empty();
            }
        }, 'json');
        
    });
})