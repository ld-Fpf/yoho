if(!window.YohoBuy){
    var YohoBuy = new Object();
}
YohoBuy.Home = {
    init: function(){
        YohoBuy.Home.homeLazyLoad();       //首页图片懒加载
        YohoBuy.Home.homeTopScroll();      //首页带缩略图轮播
        YohoBuy.Home.homeBrandScroll();    //首页品牌点击切换
        YohoBuy.Home.homeFootChange();     //首页底部意见反馈切换
    },

    //首页图片懒加载
    homeLazyLoad: function(){
        $('img.lazy').lazyload({
            threshold:150,
            effect:"fadeIn"
            // placeholder: "http://static.yohobuy.com/images/v3/icon/loading.gif"
        });
    },

    //首页带缩略图轮播 focussort.phtml
    homeTopScroll: function(){
        if( $("#bigSlide") ){
            $("#bigSlide").jdSlide({
                width:1150,
                height:450,
                pics:eval(bigSlide_list)
            });
        }
    },

    //首页品牌点击切换
    homeBrandScroll: function(){
        if( $('#recommendBox') ){
            $.QSlider({sliderId : '#recommendBox',prev : '.page-before',next : '.page-next',moveWidth:1000, 'children' : 'ul'});
        }

    },

    //首页底部意见反馈切换 indexFoot.phtml
    homeFootChange: function(){

        function change(now, icon, box){
            var obj = now;
            var index = icon.index(this);
            var offset = index * 3;
            box.each(function(){
                $(this).hide();
            });
            for(var i = offset; i < offset + 3;i++){
                box.eq(i).show();
            }
            now.each(function(){
                $(this).children().removeClass('cur').html('o');
            });
            obj.children().addClass('cur').html('O');
        }

        //有货services
        $('#button-services a').click(function(){
            change($(this), $('#button-services a'), $('#foot-services ul li'));
        });

        //更多有货产品
        $('#button-mobile a').click(function(){
            change($(this), $('#button-mobile a'), $('#foot-mobile ul li'));
        });

        //在线调查
        $('#feedbackPage a').click(function(){
            $('#feedbackPage').find('a').children('span').removeClass('cur').html('o');
            $(this).children('span').addClass('cur').html('O');
            var indexNum = $('#feedbackPage a').index(this);
            $('.vote li').hide();
            $('.vote li').eq(indexNum).show();
        });

        $('.vote li').each(function(){
            var obj = this;
            var index = $(this).index();
            $(this).find('#feedbackBtn').click(function(){
                var params = {};
                var _solution = [];
                $(obj).find('input').each(function(){
                    if($(this).attr('checked') == true){
                        _solution.push($(this).val());
                    }
                });
                var _answer = $(obj).find('#feedback_answer').val();
                var _feedback = $(obj).find('#feedback_id').val();
                var _question = $(obj).find('#question_id').val();

                params['method'] = 'open.feedback.submit';
                params['feedback_id'] = _feedback || 0;
                params['question_id'] = _question || 0;
                params['answer'] = _answer || '';
                params['solution'] = _solution.join(',');
                $.getData(apiDomain, params, function(reData){
                    if(reData.result == 1){
                        var voteCount = $('.vote li').length - 1;
                        if(index == voteCount){
                            alert('感谢您的参与！');
                            return false;
                        }
                        var Next = index + 1;
                        $('.vote li').eq(index).hide();
                        $('.vote li').eq(Next).show();
                        $('#feedbackPage').children('a').eq(index).children('span').removeClass('cur').html('o');
                        $('#feedbackPage').children('a').eq(Next).children('span').addClass('cur').html('O');
                    }
                    return false;
                });
            });
        });
    }
};

$(function(){
    YohoBuy.Home.init();
});
