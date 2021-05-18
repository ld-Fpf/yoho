/*
* jquery.plugins.js
* 整理使用的插件合并到一个文件中
* @author: yingying.liu@yoho.cn
* */

/*! Lazy Load 1.9.3 - MIT license - Copyright 2010-2013 Mika Tuupola */
!function(a,b,c,d){var e=a(b);a.fn.lazyload=function(f){function g(){var b=0;i.each(function(){var c=a(this);if(!j.skip_invisible||c.is(":visible"))if(a.abovethetop(this,j)||a.leftofbegin(this,j));else if(a.belowthefold(this,j)||a.rightoffold(this,j)){if(++b>j.failure_limit)return!1}else c.trigger("appear"),b=0})}var h,i=this,j={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null,placeholder:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"};return f&&(d!==f.failurelimit&&(f.failure_limit=f.failurelimit,delete f.failurelimit),d!==f.effectspeed&&(f.effect_speed=f.effectspeed,delete f.effectspeed),a.extend(j,f)),h=j.container===d||j.container===b?e:a(j.container),0===j.event.indexOf("scroll")&&h.bind(j.event,function(){return g()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,(c.attr("src")===d||c.attr("src")===!1)&&c.is("img")&&c.attr("src",j.placeholder),c.one("appear",function(){if(!this.loaded){if(j.appear){var d=i.length;j.appear.call(b,d,j)}a("<img />").bind("load",function(){var d=c.attr("data-"+j.data_attribute);c.hide(),c.is("img")?c.attr("src",d):c.css("background-image","url('"+d+"')"),c[j.effect](j.effect_speed),b.loaded=!0;var e=a.grep(i,function(a){return!a.loaded});if(i=a(e),j.load){var f=i.length;j.load.call(b,f,j)}}).attr("src",c.attr("data-"+j.data_attribute))}}),0!==j.event.indexOf("scroll")&&c.bind(j.event,function(){b.loaded||c.trigger("appear")})}),e.bind("resize",function(){g()}),/(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion)&&e.bind("pageshow",function(b){b.originalEvent&&b.originalEvent.persisted&&i.each(function(){a(this).trigger("appear")})}),a(c).ready(function(){g()}),this},a.belowthefold=function(c,f){var g;return g=f.container===d||f.container===b?(b.innerHeight?b.innerHeight:e.height())+e.scrollTop():a(f.container).offset().top+a(f.container).height(),g<=a(c).offset().top-f.threshold},a.rightoffold=function(c,f){var g;return g=f.container===d||f.container===b?e.width()+e.scrollLeft():a(f.container).offset().left+a(f.container).width(),g<=a(c).offset().left-f.threshold},a.abovethetop=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollTop():a(f.container).offset().top,g>=a(c).offset().top+f.threshold+a(c).height()},a.leftofbegin=function(c,f){var g;return g=f.container===d||f.container===b?e.scrollLeft():a(f.container).offset().left,g>=a(c).offset().left+f.threshold+a(c).width()},a.inviewport=function(b,c){return!(a.rightoffold(b,c)||a.leftofbegin(b,c)||a.belowthefold(b,c)||a.abovethetop(b,c))},a.extend(a.expr[":"],{"below-the-fold":function(b){return a.belowthefold(b,{threshold:0})},"above-the-top":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-screen":function(b){return a.rightoffold(b,{threshold:0})},"left-of-screen":function(b){return!a.rightoffold(b,{threshold:0})},"in-viewport":function(b){return a.inviewport(b,{threshold:0})},"above-the-fold":function(b){return!a.belowthefold(b,{threshold:0})},"right-of-fold":function(b){return a.rightoffold(b,{threshold:0})},"left-of-fold":function(b){return!a.rightoffold(b,{threshold:0})}})}(jQuery,window,document);

/*
 * doT.js框架模板
 * */
(function(){function o(){var a={"&":"&#38;","<":"&#60;",">":"&#62;",'"':"&#34;","'":"&#39;","/":"&#47;"},b=/&(?!#?\w+;)|<|>|"|'|\//g;return function(){return this?this.replace(b,function(c){return a[c]||c}):this}}function p(a,b,c){return(typeof b==="string"?b:b.toString()).replace(a.define||i,function(l,e,f,g){if(e.indexOf("def.")===0)e=e.substring(4);if(!(e in c))if(f===":"){a.defineParams&&g.replace(a.defineParams,function(n,h,d){c[e]={arg:h,text:d}});e in c||(c[e]=g)}else(new Function("def","def['"+
e+"']="+g))(c);return""}).replace(a.use||i,function(l,e){if(a.useParams)e=e.replace(a.useParams,function(g,n,h,d){if(c[h]&&c[h].arg&&d){g=(h+":"+d).replace(/'|\\/g,"_");c.__exp=c.__exp||{};c.__exp[g]=c[h].text.replace(RegExp("(^|[^\\w$])"+c[h].arg+"([^\\w$])","g"),"$1"+d+"$2");return n+"def.__exp['"+g+"']"}});var f=(new Function("def","return "+e))(c);return f?p(a,f,c):f})}function m(a){return a.replace(/\\('|\\)/g,"$1").replace(/[\r\t\n]/g," ")}var j={version:"1.0.0",templateSettings:{evaluate:/\{\{([\s\S]+?\}?)\}\}/g,
interpolate:/\{\{=([\s\S]+?)\}\}/g,encode:/\{\{!([\s\S]+?)\}\}/g,use:/\{\{#([\s\S]+?)\}\}/g,useParams:/(^|[^\w$])def(?:\.|\[[\'\"])([\w$\.]+)(?:[\'\"]\])?\s*\:\s*([\w$\.]+|\"[^\"]+\"|\'[^\']+\'|\{[^\}]+\})/g,define:/\{\{##\s*([\w\.$]+)\s*(\:|=)([\s\S]+?)#\}\}/g,defineParams:/^\s*([\w$]+):([\s\S]+)/,conditional:/\{\{\?(\?)?\s*([\s\S]*?)\s*\}\}/g,iterate:/\{\{~\s*(?:\}\}|([\s\S]+?)\s*\:\s*([\w$]+)\s*(?:\:\s*([\w$]+))?\s*\}\})/g,varname:"it",strip:true,append:true,selfcontained:false},template:undefined,
compile:undefined};if(typeof module!=="undefined"&&module.exports)module.exports=j;else if(typeof define==="function"&&define.amd)define(function(){return j});else(function(){return this||(0,eval)("this")})().doT=j;String.prototype.encodeHTML=o();var q={append:{start:"'+(",end:")+'",endencode:"||'').toString().encodeHTML()+'"},split:{start:"';out+=(",end:");out+='",endencode:"||'').toString().encodeHTML();out+='"}},i=/$^/;j.template=function(a,b,c){b=b||j.templateSettings;var l=b.append?q.append:
q.split,e,f=0,g;a=b.use||b.define?p(b,a,c||{}):a;a=("var out='"+(b.strip?a.replace(/(^|\r|\n)\t* +| +\t*(\r|\n|$)/g," ").replace(/\r|\n|\t|\/\*[\s\S]*?\*\//g,""):a).replace(/'|\\/g,"\\$&").replace(b.interpolate||i,function(h,d){return l.start+m(d)+l.end}).replace(b.encode||i,function(h,d){e=true;return l.start+m(d)+l.endencode}).replace(b.conditional||i,function(h,d,k){return d?k?"';}else if("+m(k)+"){out+='":"';}else{out+='":k?"';if("+m(k)+"){out+='":"';}out+='"}).replace(b.iterate||i,function(h,d,k,r){if(!d)return"';} } out+='";f+=1;g=r||"i"+f;d=m(d);return"';var arr"+f+"="+d+";if(arr"+f+"){var "+k+","+g+"=-1,l"+f+"=arr"+f+".length-1;while("+g+"<l"+f+"){"+k+"=arr"+f+"["+g+"+=1];out+='"}).replace(b.evaluate||i,function(h,d){return"';"+m(d)+"out+='"})+"';return out;").replace(/\n/g,"\\n").replace(/\t/g,"\\t").replace(/\r/g,"\\r").replace(/(\s|;|\}|^|\{)out\+='';/g,"$1").replace(/\+''/g,"").replace(/(\s|;|\}|^|\{)out\+=''\+/g,"$1out+=");if(e&&b.selfcontained)a="String.prototype.encodeHTML=("+
o.toString()+"());"+a;try{return new Function(b.varname,a)}catch(n){typeof console!=="undefined"&&console.log("Could not create a template function: "+a);throw n;}};j.compile=function(a,b){return j.template(a,null,b)}})();




/**
 * 首页
 * 带缩略图轮播
 * */
(function(a){
    a.fn.jdSlide=function(k){
        var p=a.extend({
                width:null,height:null,pics:[],index:0,type:"num",current:"cur",delay1:100,delay2:5000
            },k||{});
        var i=this;
        var g,f,d,h=0,e=true,b=true;
        var n=p.pics.length;

        var o=function(){
            var q="<ul class='focus-img' style='position:absolute;top:0;left:0;'><li><a onclick=getSource('"+p.pics[0]['caption']+"','首焦大1','"+p.pics[0]['column']+"'); href='"+p.pics[0]['href']+"' target='_blank'><img src='"+p.pics[0]['src']+"' width='"+p.width+"' height='"+p.height+"' /></a></li></ul>";
            i.css({position:"relative"}).html(q);
            i.find("ul").css({width:n*p.width+"px",height:p.height+"px"});
            a(function(){
                c();
            });
        };
        o();
        var j=function(){
            var s=[], r, q, smallNum = 1;
            s.push("<div id='_smallPic' class='focus-bottom'><ul class='clear'>");
            for(var t=0;t<n;t++){
                r=(t==p.index)?p.current:"";
                switch(p.type){
                    case "num":
                        q = '<img src="'+p.pics[t]['imagesmall']+'"/>';
                        break;
                    case "string":
                        q=p.pics[t]['alt'];
                        break;
                    case"image":
                        q="<img src='"+p.pics[t].breviary+"' />";
                    default:
                        break;
                }
                s.push("<li class='"+r+"'>");
                s.push(q);
                s.push("<a onclick=getSource('"+p.pics[t]['caption']+"','首焦小"+smallNum+"','"+p.pics[t]['column']+"'); href='"+p.pics[t]['href']+"' target='_blank'>&nbsp;</a></li>");
                smallNum++;
            }
            s.push("</ul></div>");
            $('#focus-top2').after(s.join(""));
            var x=[];
            x.push('<span class="button-switch clear"><a href="javascript:void(0)" id="goback" class="left rgbc"><span class="ifont">&lt;</span></a><a href="javascript:void(0)" id="forward" class="right"><span class="ifont rgbc">&gt;</span></a></span>');
            i.append(x.join(""));
            i.find("#goback").bind("mouseover",function(){
                b=false;
                clearTimeout(g);
                clearTimeout(d)
            }).bind("click",function(){
                var u=p.index-1;
                if(u<0){
                    u=t-1;
                }
                l(u);
            }).bind("mouseleave",function(){
                b=true;
            });
            i.find("#forward").bind("mouseover",function(){
                b=false;
                clearTimeout(g);
                clearTimeout(d)
            }).bind("click",function(){
                var u=p.index+1;
                l(u);
            }).bind("mouseleave",function(){
                b=true;
            });
            $('#_smallPic').find("li").bind("mouseover",function(){
                b=false;
                clearTimeout(g);
                clearTimeout(d);
                var u=$('#_smallPic').find("li").index(this);
                if(p.index==u){
                    return;
                }else{
                    d=setInterval(function(){
                        if(e){ l(u); }
                    },p.delay1);
                }
            }).bind("mouseleave",function(){
                b=true;
                clearTimeout(g);
                clearTimeout(d);
                g=setTimeout(function(){
                    l(p.index+1,true);
                },p.delay2);
            });
            i.bind("mouseover",function(){
                $("#slide .o-control").show();
            }).bind("mouseleave",function(){
                $("#slide .o-control").hide();
            })
        };
        var l=function(r,q){
            if(r==n){ r=0;}

            if( !$('.focus-img li').eq(r).find('img').attr('src') && $('.focus-img li').eq(r).find('img').attr('data-original') ){
                $('.focus-img li').eq(r).find('img').attr('src', $('.focus-img li').eq(r).find('img').attr('data-original'));
            }

            f=setTimeout(function(){
                $('#_smallPic').find("li").eq(p.index).removeClass(p.current);
                $('#_smallPic').find("li").eq(r).addClass(p.current);
                m(r,q);
            },20);
        };
        var m=function(u,q){
            var s=parseInt(h);
            var v=Math.abs(s+p.index*p.width);
            var t=Math.abs(u-p.index)*p.width;
            var r=Math.ceil((t-v)/4);
            if(v==t){
                clearTimeout(f);
                if(q){
                    p.index++;
                    if(p.index==n){ p.index=0;}
                }else{
                    p.index=u;
                }
                e=true;
                if(e&&b){
                    clearTimeout(g);
                    g=setTimeout(function(){
                        l(p.index+1,true);
                    },p.delay2);
                }
            }else{
                if(p.index<u){
                    h=s-r;
                    i.find("ul").css({left:h+"px"});
                }else{
                    h=s+r;
                    i.find("ul").css({left:h+"px"});
                }
                e=false;
                f=setTimeout(function(){
                    m(u,q);
                },20);
            }
        };
        var c=function(){
            var q=[];
            var bigNum = 2;
            for(var r=1;r<n;r++){
                q.push("<li><a href='");
                q.push(p.pics[r]['href']);
                q.push("' target='_blank' onclick=getSource('"+p.pics[r]['caption']+"','首焦大"+bigNum+"','"+p.pics[r]['column']+"');><img data-original='");
                q.push(p.pics[r]['src']);
                q.push("' width='");
                q.push(p.width);
                q.push("' height='");
                q.push(p.height);
                q.push("' class='lazy' /></a></li>");
                bigNum++;
            }
            i.find("ul").append(q.join(""));
            g=setTimeout(function(){
                l(p.index+1,true);
            },p.delay2);
            if(p['type']){ j(); }
        }
    }
})(jQuery);






