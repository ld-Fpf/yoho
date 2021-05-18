//var __custom = {'order':'123456'};

var QAnalysis = function () {
    var view = null;
    var _this = this;
    var initOption={
        modlink:false
    };
    var view_src = 'http://analytics.open.yohobuy.com/?';
    var click_src = 'http://analytics.open.yohobuy.com/?';
    this.main = function (options) {
        initOption = _this.extend(initOption, options);
        initOption.dis = screen.width+'x'+screen.height;
        initOption.ref = this.refer();

        if (typeof(__custom) == 'object') {
            for (var key in __custom) {
                initOption[key] = __custom[key];
            }
        }

        view = document.createElement('img');
        var tail = [];
        for(var key in initOption){
            if (initOption[key] != null) {
                tail.push(key + '=' + initOption[key]);
            }
        }
        view.src= view_src + tail.join('&');
        if (initOption.modlink === true && initOption.yopid != undefined) {
            _this.modlink();
        }
        
    };
    this.addClickEvent = function (id, datas) {
        if (document.getElementById(id)) {
            var node = document.getElementById(id);
            if(typeof(node.onclick) =="function"){
                var oldonclick=node.onclick;
                node.onclick=function(){
                    _this.click(datas);
                    oldonclick();
                }
            }else{
                node.onclick= function () {
                    _this.click(datas);
                };
            }
        }
        
    };
    this.extend = function (target, options) {
        for (name in options) {  
            target[name] = options[name];  
        }  
        return target; 
    };
    this.refer = function () {
       var referrer = '';
       try {
           referrer = window.top.document.referrer;
       } catch (e) {
         if (window.parent) {
               try {
                   referrer = window.parent.document.referrer;
               } catch (e2) {
                   referrer = '';
               }
           }
       }
       if (referrer === '') {
           referrer = document.referrer;
       }
       return escape(referrer);
    };
    this.modlink = function modlink() {
      var alist=document.getElementsByTagName('a');
      var length=alist.length;
      for (i = 0; i < length; i++) {
          if (alist[i].href.substr(0,10) != 'javascript') {
              alist[i].onmousedown=_this.mousedown;
          } else if (conf['click']===true){
              alist[i].onclick=_this.click;
          }
      }
    };
    this.mousedown = function () {
        if (initOption.yopid == 0 || initOption.yopid == undefined) {
            return true;
        }
        if (typeof(this.attributes['spm-name']) == 'undefined') {
            return true;
        }
        spm=this.attributes['spm-name'].nodeValue;
        if (spm == null || spm == undefined) {
            return true;
        }
        pspm = _this.getParspm(this.parentNode);
        if (pspm == false) {
            return true;
        }
        if (this.href.indexOf('spm=') < 0) {
            if (this.href.indexOf('?') >= 0) {
                this.href=this.href+'&spm='+initOption.yopid+'.'+pspm+'.'+spm;
            } else {
                this.href=this.href+'?spm='+initOption.yopid+'.'+pspm+'.'+spm;
            }
        }
        return true;
    };
    this.getParspm = function (node) {
        var bodyNode = document.getElementsByTagName('body');
        if (typeof(node.attributes['spm-name']) == 'undefined' && node != bodyNode[0]) {
            return _this.getParspm(node.parentNode);
        } else if (typeof(node.attributes['spm-name']) != 'undefined'){
            return node.attributes['spm-name'].nodeValue;
        } else {
            return false;
        }
    };
    this.click = function(datas) {
        var node = this;
        var click=document.createElement('img');
        var time = (new Date()).valueOf();
        var gparam = new Array();
        gparam.push('clicktime='+time);
        gparam.push('analysis_type=click');
        for (var x in datas) {
            gparam.push(x + '=' + datas[x]);
        }
        click.src= click_src + gparam.join('&');
        return true;
    };
    this.getParentClass = function (node) {
        var bodyNode = document.getElementsByTagName('body');
        if (node.className != '') {
            return node.className;
        } else if (typeof(node.parentNode.className) == 'undefined' && node != bodyNode[0]) {
            return _this.getParentClass(node.parentNode);
        } else if (typeof(node.parentNode.className) != 'undefined') {
            return node.parentNode.className;
        } else {
            return false;
        }
    };
    this.init = function (options) {
        _this.main(options);
    };
    this.appendClick = function (id, datas) {
        _this.addClickEvent(id, datas);
    };
    this.dataCollect  = function (datas) {
        _this.click(datas);
    };
};
var Qa = new QAnalysis;
Qa.init();
