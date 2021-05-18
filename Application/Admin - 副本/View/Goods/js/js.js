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
//添加栏目
function selectCate(obj){
    var url = $(obj).attr('href'),
        h = '<form action="'+url+'" method="get" class="">\
        <div class="p5 form w300" style="max-height:500px;overflow:auto;">\
        <select name="cid" size="30" class="pct100">\
        ';
    $.post(postUrl,null,function(cates){
        // for(var i in cates){
        //     h+='<option value="'+cates[i]['cid']+'">'+cates[i]['_name']+'</option>';
        // }
        h+=cates;
        h+='</select></div>\
        <div class="p5 tc">\
        <input type="submit" class="btn bgteal" value="确定">\
        </div></form>';
        $.msg({
            str:h,
            timeout:50,
            shade:1,
            closebtn:0
        })
    },'html')
    
    return false;
}