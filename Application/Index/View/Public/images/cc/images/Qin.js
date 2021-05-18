(function($) {
    $.fn.smartFloat = function() {
        var position = function(element) {
            var top = element.position().top, pos = element.css("position"),_height = $('#leftMenuBox').outerHeight(true);
            $(window).scroll(function() {
                footer = $('#footerBox').position().top;
                var scrolls = $(this).scrollTop();
                var _footer = parseInt(footer) - parseInt(_height) - 5 - parseInt(scrolls);
                if (scrolls > top) {
                    if(_footer < 0){element.css({position : "fixed",top:_footer + 'px'});}else{
                        if (window.XMLHttpRequest) {element.css({position: "fixed",top: '10px'});} else {element.css({top: scrolls});}
                    }
                }else {
                    element.css({position: pos,top:0});
                }
            });
        };
        return $(this).each(function() {
            position($(this));
        });
    };
    $.fn.showLayout = function(options) {
		//mouse mouseover和mouseout
		var defaults = {'showLayoutId':'','showTime':500,'eventType' : 'mouse','onEvent' : ''};
		var params = $.extend(defaults, options);
		return this.each(function() {
			if(params.showLayoutId == ''){console.log('需要显示的层ID为空');return false;}
			var time = params.showTime || 1000;
			var eventType = params.eventType || 'mouse';
			if(eventType == 'mouse'){
				$(this).bind('mouseenter',function(){$(params.showLayoutId).fadeIn(params.showTime);if(params.onEvent != ''){eval(params.onEvent(false));}});
				$(this).bind('mouseleave',function(){$(params.showLayoutId).fadeOut(params.showTime);if(params.onEvent != ''){eval(params.onEvent(true));}});

			}else if(eventType == 'click'){
				$(this).click(function(){
					var isHidden = false;
					if($(params.showLayoutId).is(':hidden') == false){$(params.showLayoutId).fadeOut(params.showTime);isHidden = true;}else{$(params.showLayoutId).fadeIn(params.showTime);isHidden = false;}
					if(params.onEvent != ''){eval(params.onEvent(isHidden));}
				});
			}
		});
	};
	$.fn.favorite = function(favName,favUrl){
		var ctrl = (navigator.userAgent.toLowerCase()).indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL';
		return this.each(function() {
			$(this).click(function(){
				try {
					if($.browser.msie)
					{
					  	window.external.addFavorite(favUrl,favName);
					}
					else if($.browser.mozilla)
					{
					   window.sidebar.addPanel(favName,favUrl,"");
					}
					else if($.browser.opera ) // For Opera Browsers
					{
						$(this).attr("href",favUrl);
						$(this).attr("title",favName);
						$(this).attr("rel","sidebar");
						$(this).click();
					}
					else{
					  alert('您的浏览器不支持自动加收藏，请按 '+ctrl+'+D 进行添加！');
					}
				} catch (e) {
					alert('您的浏览器不支持自动加收藏，请按 '+ctrl+'+D 进行添加！');
				}
			});
		});
	};
	$.extend({
		QSITE_DOMAIN : '.yhbimg.com',
		getData : function(domain, options, onSuccess){
			var defaults = {'page' : 1,'method' : '','v' : 1,'return_type' : 'jsonp','open_key' : '12345','tmp' : Math.random()};
			if(typeof(domain) == undefined || domain == ''){console.log('请设置请求的api地址');return false;}
			var params = $.extend(defaults, options);
			params.page = params.page || 1;
			if(params.method == ''){console.log('请设置请求的URL');return false;}
			try{
				$.getJSON(domain + '/?callback=?',params,function(_data){if(onSuccess != ''){eval(onSuccess(_data.data));return false;}});
			}catch(e){
				console.log(e.message);
			}
		},
		cookie : function (name){
			var cookieValue = null;if (document.cookie && document.cookie != '') {var cookies = document.cookie.split(';');for (var i = 0; i < cookies.length; i++) {var cookie = jQuery.trim(cookies[i]);if (cookie.substring(0, name.length + 1) == (name + '=')) {cookieValue = decodeURIComponent(cookie.substring(name.length + 1));break;}}}return cookieValue;
		},
		setcookie : function (name, value, options){
			if(typeof value != 'undefined'){
				options = options || {};if (value === null) {value = '';options.expires = -1;}var expires = '';
		        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
		            var date;
		            if (typeof options.expires == 'number') {date = new Date();date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));} else {date = options.expires;}
		            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
		        }
		        var path = options.path ? '; path=' + options.path : '';
		        var domain = options.domain ? '; domain=' + options.domain : '';
		        var secure = options.secure ? '; secure' : '';
		        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
			}
		},
		tmpl: function(template, data){
	        var html = '';
	        try{
	        	html = doT.template(template).apply(null,[data]);
	        }catch(e){
	        	console.log(e.message);
	        }
	        return html;
		},
		uid : function (name){
			var cookieName = name || '_UID';
			var info = $.cookie(cookieName);
			if(typeof info == 'undefined' || info == null){return 0;}
			var user = info.split('::');
			if(typeof user == 'undefined' || user.length < 4){return 0;}
	        return user[1];
		},
		getShoppingKey : function() {
			var shoppingInfo  = $.cookie('_g');
			if(typeof shoppingInfo=='undefined' || shoppingInfo == null) {return '';}
			var shoppingData = eval('(' + shoppingInfo + ')');
			return shoppingData._k;
		},
		show : function (eData, itemBox, tmpl, className, num){
			var counter = 1;
			$.each(eData, function(key, item){
				if(counter <= num){
					if(counter % 2 == 0){
						item['className'] = className;
					}
					var str = $.tmpl($('#' + tmpl).html(), item);
					counter = counter + 1;
					$(itemBox).append(str);
					delete eData[key];
				}
			});
			return eData;
		},
		goTop : function (options){
			options.item = options.item || 'goTop';
			options.time = options.time || 500;
			options.scroll = options.scroll || false;
			if(options.scroll == true){
				$(window).bind("scroll", function(){
					var scrollTopNum = $(document).scrollTop();
					(scrollTopNum > 0) ? $(options.item).parent().fadeIn("fast") : $(options.item).parent().fadeOut("fast");
				});
			}
			$(options.item).click(function(){
				$("html,body").animate({scrollTop:0}, options.time);
			});
		},
		userInfo : function (boxId, cookie, loginTmpl, noLogin)
		{
			if(typeof boxId == undefined || boxId == '' || typeof loginTmpl == undefined || loginTmpl == '' || typeof noLogin == undefined || noLogin == '')
			{
				return false;
			}
			var noLoginHtml = $('#' + noLogin).html();
			var loginHtml = $('#' + loginTmpl).html();
			var boxObj = $('#' + boxId);
			var info = $.cookie('_UID');
			if(typeof info == 'undefined' || info == null){
				boxObj.html(noLoginHtml);
				return false;
			}
			var user = info.split('::');
			if(typeof user == 'undefined' || user.length < 4){
				boxObj.html(noLoginHtml);
				return false;
			}
			var userName = user[0] || ' ';
			var name = '';
			var _length = 0;
			for(var t = 0; t < userName.length; t++){
				var char = userName.substr(t,1);
				if(/.*[\u4e00-\u9fa5]+.*$/.test(char)){
					_length += 2;
				}else{
					_length += 1;
				}
			}
			if(_length <= 10){
				name = userName;
			}else{
				_num = 0;
				for(var t = 0; t < userName.length; t++){
					if(_num < 10){
						var char = userName.substr(t,1);
						if(char != '*'){
							if(/.*[\u4e00-\u9fa5]+.*$/.test(char)){
								_num += 2;
							}else{
								_num += 1;
							}
						}
						name += char;
					}
				}
				if(name.length < userName.length){
					name += '...';
				}
			}
			var _logout = '';
        	if(/http:\/\//.test(user[3])){
        		_logout = user[3].replace('www.yohobuy.com', 'www.yohobuy.com');
        	}else{
        		_logout = 'http://www.yohobuy.com/logout_' + user[3] + '.html';
        	}
        	var data = {"user_name" : name,"logout" : _logout,"random" : Math.random()};
        	var param = {method : 'open.passport.get'};
        	$.getData(apiDomain, param, function(_data){
        		var is_login = 1;
        		if(_data.result == -1){
        			is_login = -1;
        		}
        		data['is_login'] = is_login;
        		boxObj.html($.tmpl(loginHtml,data));
        		if(_data.result == 1){
        			$._message(_data.data.messageCount, _data.data.message);
        			$._vipInfo(_data.data);
        		}else{
        			$('#myYohoBox').children('div').html($('#tmpl-my-noLogin').html());
        		}
        		return true;
        	});
	        return false;
		},
		_message : function(messageCount, messageList){
			if(parseInt(messageCount) > 0){
				$('.imessage-num').html(messageCount);
				$('#upDown').show();
				$('#messageBox').children('div').html($.tmpl($('#tmpl-message').html(), messageList));
				$('#messageBox').mouseenter(function(){
					$(this).addClass('list-cur');
				});
				$('#messageBox').mouseleave(function(){
					$(this).removeClass('list-cur');
				});
			}else{
				$('.imessage-num').html(0);
				$('#upDown').hide();
			}
		},
		_vipInfo : function(vipInfo){
			if(typeof vipInfo == undefined || vipInfo.lenght < 1){
				return false;
			}
			$('#myYohoBox').mouseenter(function(){$(this).addClass('list-cur');$('#myYohoBox').children('div').html($.tmpl($('#tmpl-my-login').html(), vipInfo));});
			$('#myYohoBox').mouseleave(function(){$(this).removeClass('list-cur');});
		},
		favProduct : function(apiDomain, objId, callback){
			$(objId).click(function(){
				if(parseInt($.uid()) == 0){
					window.location.href = 'http://www.yohobuy.com/signin.html?refer=' + document.location;
					return false;
				}
				var is_fav = $(this).attr('fav');
				var product_id = $(this).attr('product_id');
				var options = {
					method : 'open.favorite.product',
					product_id : product_id
				};
				if(is_fav == 1){
					options.method = 'open.favorite.cancelproduct';
				}
				obj = this;
				$.getData(apiDomain, options, function(data){
					if(data.result == -1){
						window.location.href = 'http://www.yohobuy.com/signin.html?refer=' + document.location;
						return false;
					}else if(data.result == 1 || data.result == -3){
						var className = 'favored';
						var fav = 1;
						if(is_fav == 1){
							$(obj).parent().removeClass('favored').addClass('favor');
							className = 'favor';
							fav = 0;
							$(obj).attr('fav',0);
						}else{
							$(obj).parent().removeClass('favor').addClass('favored');
							$(obj).attr('fav',1);
						}
						if(callback != ''){
							eval(callback(className, fav));
						}
						return false;
					}
				});
			});
		},
		brandFav : function(apiDomain){
			var brand = [];
			var obj = $('#recommendBox li');
			obj.each(function(){
				var brand_id = $(this).attr('brand');
				if(parseInt(brand_id) > 0 && typeof brand[brand_id] != undefined){
					brand.push(brand_id);
				}
			});
			if(brand.length < 1){return false;}
			var brandOpts = {method:'open.favorite.count',brands:brand.join(','),uid:$.uid('_UID')};
			$.getData(apiDomain,brandOpts,function(data){
				if(data.length < 1){
					return false;
				}
				$('.brand-favor>a').each(function(){
					var brand_id = $(this).parent().parent().attr('brand');
					if(parseInt(brand_id) < 1){
						return;
					}
					if(typeof(data[brand_id]) == 'undefined' || data[brand_id].length < 1)
					{
						return;
					}
					var count = parseInt(data[brand_id]['count']);
					if(data[brand_id]['is_favorite'] == 1){
						$(this).children().children('.text').text('取消收藏');
					}
					$(this).children().children('.num').text(count);
				});
			});
		},
		favBrand : function(apiDomain){
			$('.brand-favor>a').click(function(){
				var brand_id = $(this).parent().parent().attr('brand');
				var uid = $.uid('_UID');
				if(parseInt(uid) < 1)
				{
					window.location.href = 'http://www.yohobuy.com/signin.html?refer=' + document.location;
					return false;
				}
				var text = $(this).children().children('.text').text();
				if(text == '收藏品牌'){
					var brandOpts = {method:'open.favorite.brand',brand_id:brand_id,uid:uid};
					$.getData(apiDomain, brandOpts, function(data){
						if(data.result == -1){
							window.location.href = 'http://www.yohobuy.com/signin.html?refer=' + document.location;
							return false;
						}
						if(data.result == 1){
							$('.brand-favor>a').each(function(){
								var brandId = $(this).parent().parent().attr('brand');
								if(brand_id == brandId){
									$(this).children().children('.text').text('取消收藏');
									$(this).children().children('.num').text(parseInt(data.count));
								}
							});
							return false;
						}
					});
				}else{
					var brandOpts = {method:'open.favorite.cancelFavorite',brand_id:brand_id,uid:uid};
					$.getData(apiDomain, brandOpts, function(data){
						if(data.result == -1){
							window.location.href = 'http://www.yohobuy.com/signin.html?refer=' + document.location;
							return false;
						}
						if(data.result == 1){
							$('.brand-favor>a').each(function(){
								var brandId = $(this).parent().parent().attr('brand');
								if(brand_id == brandId){
									$(this).children().children('.text').text('收藏品牌');
									$(this).children().children('.num').text(parseInt(data.count));
								}
							});
							return false;
						}
					});
				}
			});
		},
		favoriteBrand : function(){
			$('#brandFavor').click(function(){
				var brand_fav = $('#brandFavor').attr('favorite');
				var t = brand_fav == 0 ? '' : 'favored';
				var method = brand_fav == 0 ? 'open.favorite.brand' : 'open.favorite.cancelFavorite';
				var className = brand_fav == 0 ? 'favored' : '';
				if($.uid() == 0){
					location.href = 'http://www.yohobuy.com/signin.html';
					return false;
				}
				var brand_id = $(this).attr('brand');
				$.getData(apiDomain, {'method' : method, 'brand_id' : brand_id},function(data){
					if(data.result == -1){
						location.href = 'http://www.yohobuy.com/signin.html';
						return false;
					}
					if(data.result != 1){
						if(brand_fav == 1){
							alert('取消失败，请稍后再试');
							return false;
						}
						alert('收藏品牌失败，请稍后再试');
						return false;
					}
					if(brand_fav == 0)
					{
						$('#brandFavor').attr('favorite', 1);
						$('#brandFavor').addClass('favored');
					}else{
						$('#brandFavor').removeClass('favored');
						$('#brandFavor').attr('favorite', 0);
					}
					return false;
				});
				return false;
			});
		},
		QSlider : function(options){
			var defaults = {
				sliderId : '',
				prev : '',
				next : '',
				moveWidth : 500,
				children : 'div',
				time : 500,
				callback : ''
			};
			var params = $.extend(defaults, options);
			if(params.sliderId == ''){
				return false;
			}
			var _length = $(params.sliderId).children(params.children).length;
			if($(params.sliderId).children(params.children).length <= 1)
			{
				return false;
			}
			$(params.sliderId).children(params.children).each(function(){
				if($(this).index() > 0){
					$(this).hide();
				}
			});
			var index = 0;
			if(params.prev != ''){
				$(params.prev).click(function(){
					$(params.sliderId).children(params.children).eq(index).hide();
					index = index - 1;
					if(index < 0){
						index = _length - 1;
					}
					$(params.sliderId).children(params.children).eq(index).fadeIn(1000);
				});
			}
			if(params.next != ''){
				$(params.next).click(function(){
					$(params.sliderId).children(params.children).eq(index).hide();
					index = index + 1;
					if(index >= _length){
						index = 0;
					}
					$(params.sliderId).children(params.children).eq(index).fadeIn(1000);
				});
			}
		},
        QGetImages : function(imageUrl, type, project) {
            if (!imageUrl || !type) {
                return '';
            }
            var imgArr = imageUrl.split("/");
            if (imgArr.length < 5) {
                return '';
            }
            var newImages = 'http://img' + imgArr[imgArr.length - 1].substr(0, 2)
                + ".static" + this.QSITE_DOMAIN + "/";
            if (type == 'source') {
                newImages += project + imageUrl;
            } else {
                var typeArr = type.split("x");
                if (typeArr[0].length > 3 || typeArr[1].length > 3) {
                    return '';
                }
                var newType = sprintf("%04d",typeArr[0]) + sprintf("%04d",typeArr[1]);
                try {
                    var fileArr = imgArr[imgArr.length - 1].split('.');
                    var newFile = fileArr[0] + newType + "." + fileArr[1];
                    imgArr.splice(imgArr.length - 1, 1);
                    newImages += "thumb" + imgArr.join("/") + "/" + newFile;
                } catch (err) {
                    newImages = "";
                }
            }
            return newImages;
        },
        QFSFImages:function(imagesUrl, project, thumbSize, mode) {
            if ( !imagesUrl || !thumbSize || !project ) { return ''; }
            if(thumbSize == 'source')
            {
                return $.QGetImages(imagesUrl, thumbSize, project);
            }
            var imageSplit = imagesUrl.split("/");
            var domain = $.fRandomBy(3,4);
            var thumb = 'http://img0' + domain + ".static" + this.QSITE_DOMAIN + '/';
            var thumbBox = thumbSize.split("x");
            if (thumbBox[0].length > 4 || thumbBox[1].length > 4) { return ''; }
            var newFileFormat = sprintf("%04d",thumbBox[0]) + 'x' + sprintf("%04d",thumbBox[1]);
            try {
                var fileBox = imageSplit[imageSplit.length - 1].split('.');
                var newFile = fileBox[0] + '-' + newFileFormat + '-' + mode + '-' + project + "." + fileBox[1];
                imageSplit.splice(imageSplit.length - 1, 1);
                thumb += "thumb" + imageSplit.join("/") + "/" + newFile;
            } catch (err) { thumb = ""; }
            return thumb;
        },
        fRandomBy:function(under, over){
            switch(arguments.length){
                case 1: return parseInt(Math.random()*under+1);
                case 2: return parseInt(Math.random()*(over-under+1) + under);
                default: return 0;
            }
        },
        showAds : function(apiDomain, position){
            if(typeof position == undefined || position == ''){
                return false;
            }
            var params = {
                method : 'open.ads.get',
                position:position
            };
            $.getData(apiDomain, params, function(reData){
                if(reData.result != 1){
                    return false;
                }
                var adsList = reData.data;
                for(k in adsList){
                    var info = adsList[k];
                    if(typeof info != undefined && info.length > 0){
	                    for(key in info){
	                    	var adsInfo = info[key];
	                    	$('#ads_' + k).append('<a href="'+adsInfo['ads_url']+'" target="_blank"><img src="'+ $.QFSFImages(adsInfo['ads_image'],'adpic', 'source', 2)+'"/></a>');
	                    }
                    }
                }
            });
        },
        showAdsList : function(apiDomain, position, tmpl, callback){
            if(typeof position == undefined || position == ''){
                return false;
            }
            var params = {
                method : 'open.ads.get',
                position:position
            };
            var tmplName = tmpl || '';
            $.getData(apiDomain, params, function(reData){
                if(reData.result != 1){
                    return false;
                }
                var adsList = reData.data;
                for(k in adsList){
                    var info = adsList[k];
                    if(typeof info != undefined && info.length > 0){
	                    for(key in info){
	                    	info[key]['ads_image'] = $.QFSFImages(info[key]['ads_image'],'adpic', 'source', 2);
	                    }
                    }
                    html = $.tmpl(tmpl, info);
                	$('#ads_' + k).append(html);
                }
                if(typeof callback != 'undefined' && callback != ''){eval(callback());}
            });
        },
        showAdsListAndGender : function(options){
            var options = $.extend({
            	'apiDomain' : '',
            	'position' : 0,
            	'max_sort_id' : 0,
            	'middle_sort_id' : 0,
            	'gender' : '',
            	'tmpl' : '',
            	'adsBox' : ''
            }, options);
        	if(options.position == 0 || options.apiDomain == '' || options.tmpl == '' || options.adsBox == ''){
                return false;
            }
            var params = {
                method : 'open.ads.getlist',
                position_id:options.position,
                max_sort_id:options.max_sort_id,
                middle_sort_id:options.middle_sort_id,
                gender:options.gender
            };
            $.getData(options.apiDomain, params, function(reData){
                if(reData.result != 1){
                    return false;
                }
                var adsList = reData.data;
                $(options.adsBox).html($.tmpl(options.tmpl, adsList));
            });
        },
        QINWidth : function(){
        	function setWidthByWin()
        	{
        		var win_width = parseInt($(window).width());
        		//给返回顶部预留20px的空间 1440+20*2=1284
        		if(win_width >= 1240){
        			$('.header-top').children('div').eq(0).attr('class','clear screen1240');
        			$('.header-nav').children('div').eq(0).attr('class','screen1240 nav-main clear rgbc');
        			$('.promise').children('div').eq(0).attr('class','screen1240 clear');
        			$('.footer-help').children('div').eq(0).attr('class','screen1240 clear');
        			$('.footer-link').children('div').eq(0).attr('class','screen1240 clear');
        		}else{
        			$('.header-top').children('div').eq(0).attr('class','clear screen990');
        			$('.header-nav').children('div').eq(0).attr('class','screen990 nav-main clear rgbc');
        			$('.promise').children('div').eq(0).attr('class','screen990 clear');
        			$('.footer-help').children('div').eq(0).attr('class','screen990 clear');
        			$('.footer-link').children('div').eq(0).attr('class','screen990 clear');
        		}
        	}
        	setWidthByWin();
        	$(window).resize(
        		function(){
        			setWidthByWin();
        		}
        	);
        },
        browse : function (product_id, goods_id){
        	if(parseInt(product_id) < 1 || parseInt(goods_id) < 1){
        		return false;
        	}
        	$.getJSON('/product/index/userbrowse',{product_id : product_id, goods_id : goods_id}, function(eData){
        		return true;
        	});
        },
        returned : function(_type){
        	$.setcookie('_N',1,{path : '/',domain : '.yohobuy.com',expires : -1});
        	var url = '';
        	if(_type == 1){
        		url = 'http://www.yohobuy.com';
        	}else if (_type == 2){
        		url = 'http://www.yohobuy.com/woman';
        	}else{
        		url = location.href;
        	}
        	document.location.href = url;
        },
        clickImgCode : function( nspace ,imgCodeId) {
            var dt = new Date();
            var group = '';
            if(nspace){
            	group = "&g="+nspace;
            }
            var imgcode = 'imgcode';
            if(imgCodeId){
            	imgcode = imgCodeId;
            }
            var src = "/passport/images?t=" + dt.getTime() + group;
            $('#' + imgcode).attr('src', src);
            return false;
        },
        siblings : function (options){var defaults = {'openBtn' : '','closeBtn' : '','box' : ''};var params = $.extend(defaults, options);if(params.openBtn == '' || params.closeBtn == '' || params.minBox == '' || params.maxBox == ''){return false;}$(params.openBtn).children('a').eq(0).click(function(){$(params.box).children().eq(0).siblings();$(params.box).children().eq(1).slideDown('slow').siblings().slideUp('slow');});$(params.closeBtn).children('a').eq(0).click(function(){$(params.box).children().eq(1).siblings();$(params.box).children().eq(0).slideDown('slow').siblings().slideUp('slow');var pos=$(params.box).offset().top - 60;$("html,body").animate({scrollTop:pos}, 1000);});},
        moreSelect : function(options){
        	var defaults = {'openBtn' : '','closeBtn' : '','box' : ''};
        	var params = $.extend(defaults, options);
        	if(params.openBtn == '' || params.closeBtn == '' || params.box == ''){return false;}
        	$(params.openBtn).click(function(){
        		$(params.openBtn).hide();
        		$(params.closeBtn).show();
        		$(params.box).slideToggle("slow");
        	});
        	$(params.closeBtn).click(function(){
        		$(params.closeBtn).hide();
        		$(params.openBtn).show();
        		$(params.box).slideToggle("slow");
        	});
        },
        recent : function(options){
        	var defaults = {
        		'img_size' : '180x240',
        		'boxId' : 'recentReview',
        		'tmpl' : '#recentReview-tmpl',
        		'limit' : 5,
        		'ip' : ''
        	};
        	var params = $.extend(defaults, options);
			$.getData(apiDomain, {'method' : 'open.passport.browse','img_size' : params.img_size,'limit' : params.limit,'uid' : $.uid('_UID'),'ip' : params.ip},function(data){
				$(params.boxId).html($.tmpl($(params.tmpl).html(), data));
			});
		},
		focus : function(options){
			var options = $.extend({'image' : '','box' : '.focus-top2','imageBox' : '.focus-img','btnBox' : '.button-switch','width' : 1150,'preClassName' : 'left','speed' : 3000,'tmpl' : '','circle' : '#banner-circle a', 'pageSize' : 1, 'auto' : true},options);
			var $banner=$(options.box);
			if(options.image != '' && options.tmpl != '')
			{
				$banner.html($.tmpl($(options.tmpl).html(), options.image));
			}
	        var $banner_ul=$(options.imageBox), $btn=null, $btn_a=null, page=1, timer=null, btnClass=null, v_width = $(options.width).width(), page_count=Math.ceil($banner_ul.find('li').length/options.pageSize);
	        if(options.btnBox != ''){
	        	$btn = $(options.btnBox);
	        	$btn_a = $btn.find('a');
	        }
	        $banner.attr('style', 'overflow:hidden');
	        $banner_ul.width(page_count*v_width);
	        $(window).resize(function(){
	        	v_width = $(options.width).width();
	        	$banner_ul.width(page_count*v_width);
	        });
	        //手动及自动播放
	        function move(obj, classname) {
	        	if (!$banner_ul.is(':animated')) {
	        		if (classname == options.preClassName) {
	        			if (page == 1) {
	        				$banner_ul.animate({left: -v_width * (page_count - 1)});
	        				page = page_count;
	        			} else {
	        				$banner_ul.animate({left: '+=' + v_width}, "slow");
	        				page--;
	        			}
	        		} else {
	        			if (page == page_count) {
	        				$banner_ul.animate({left: 0});
	        				page = 1;
	        			} else {
	        				$banner_ul.animate({left: '-=' + v_width}, "slow");
	        				page++;
	        			}
	        		}
	        		cirMove();
	        	}
	        }
	        /*检测page的值，使当前的page与selected的小圆点一致*/
	        var cirMove = function (){
	        	if(options.circle != ''){
	        		$(options.circle).children('span').removeClass('cur').html('o');
	        		$(options.circle).eq(page-1).children('span').addClass('cur').html('O');
	        	}
	        }
	        if(options.auto == true){
		        $banner.mouseover(function(){$btn.css({'display':'block'});clearInterval(timer);}).mouseout(function(){$btn.css({'display':'none'});clearInterval(timer);timer=setInterval(move,options.speed);}).trigger("mouseout");//激活自动播放
		        $btn_a.mouseover(function(){/*实现透明渐变，阻止冒泡*/$(this).animate({opacity:0.6},'fast');$btn.css({'display':'block'});return false;}).mouseleave(function(){$(this).animate({opacity:0.3},'fast');$btn.css({'display':'none'});return false;}).click(function(){/*手动点击清除计时器*/btnClass=this.className;clearInterval(timer);timer=setInterval(move,options.speed);move($(this),this.className);});
	        }
	        $(options.circle).live('click',function(){var index=$(options.circle).index(this);$banner_ul.animate({left:-v_width*index},'slow');page=index+1;cirMove();});
		},
		imageHover : function(){
			$('a img').mouseover(function(){
				var obj = this;
				$(this).attr('style', 'opacity: 0.8;filter:alpha(opacity=80);');
				var show = function(){
					$(obj).attr('style', '');
				}
				setTimeout(show, 200);
			});
		}
	});
	$.fn.miniCart = function(options){
		var defaults = {
			'cookie' : '_g',
			'cartNum' : ''
		};
		var params = $.extend(defaults, options);
		var cartInfo = eval('(' + $.cookie(params.cookie) + ')');
		if(cartInfo != null ){
			var totalNum = parseInt(cartInfo._nac) + parseInt(cartInfo._ac);
			if(totalNum == 0) {
				$('#icart-num').attr('class', 'icart-num icart-none');
			} else {
				$('#icart-num').attr('class', 'icart-num');
			}
			$(params.cartNum).html(totalNum);
		}
	};
	$.fn.items = function(apiUrl, options, tmpl, num, height, scroll, className){
		if(typeof apiUrl == undefined || apiUrl == ''){throw new Error('Api Url is null');}
		if(typeof options == undefined || options == ''){throw new Error('Request parameter is null');}
		if(typeof tmpl == undefined || tmpl == ''){throw new Error('template id is null');}
		height = height || 200; scroll = scroll || true; className = className || '';

		var itemBox = this;
		var eData = [];
		//获取数据
		$.getData(apiUrl, options, function(data){
			eData = data.data || [];
			eData = $.show(eData, itemBox, tmpl, className, num);
			// 滚动到下面自动加载的
		    $(window).scroll(function() {
		        var $doc = $(document);
		        if(eData.length > 0 && $doc.scrollTop() >= $doc.height() - $('.and-more').outerHeight() - $(window).height() - 500) {
		        	eData = $.show(eData, itemBox, tmpl, className, num);
		        	console.log(eData);
		        }
		    });
		});
	};
	$.fn.guide = function(btn, closeBtn){
		var _guide = $.cookie('_Guide');
		if(typeof _guide != undefined && _guide != null)
		{
			return false;
		}
		if($.browser.msie){
			$('html').css({overflow : 'hidden'});
		}else{
			$('body').css({overflow : 'hidden'});
		}
		$(this).show();
		$('.mask-lever').css({'height':$(window).height()});
		var guide = this;
		var set = function(){
			var expire = 365;
			var params = {'path':'/','domain':'.yohobuy.com','expires':expire};
			$.setcookie('_Guide', 1, params);
			if($.browser.msie){
				$('html').css({overflow : 'scroll'});
			}else{
				$('body').css({overflow : 'scroll'});
			}
			$('.mask-lever').hide();
		};
		$(btn).click(function(){
			set();
		});
		$(closeBtn).click(function(){
			set();
		});
	};
	$.fn.QINSlider = function(options){
		var defaults = {'changeType' : 'click','element' : '','type' : 'img','className' : '','pre' : '','next' : '','preClass' : '','nextClass' : ''};
		var params = $.extend(defaults, options);
		var index = 0;
		var _listBox = $(this);
		var length = _listBox.length;
		var _style = function(){
			if(params.pre != '' && params.next != ''){
				if(parseInt(length) <= 1){
					$(params.pre).addClass(params.preClass);
					$(params.pre).unbind();
					$(params.next).addClass(params.nextClass);
					$(params.next).unbind();
					return false;
				}
				if(index == 0){
					$(params.pre).addClass(params.preClass);
					$(params.pre + " a").unbind();
					$(params.next).removeClass(params.nextClass);
					$(params.next + " a").unbind().click(function(){next();});
				}else if(index < (length - 1)){
					$(params.pre).removeClass(params.preClass);
					$(params.pre + " a").unbind().click(function(){pre();});
					$(params.next).removeClass(params.nextClass);
					$(params.next + " a").unbind().click(function(){next();});
				}else{
					$(params.next).addClass(params.nextClass);
					$(params.next + " a").unbind();
					$(params.pre).removeClass(params.preClass);
					$(params.pre + " a").unbind().click(function(){pre();});
				}
			}};
		var next = function(){if(index == length)return false;oldIndex = index;index = index + 1;_style();changeContent(oldIndex);};
		var pre = function(){if(index == 0)return false;oldIndex = index;index = index - 1;_style();changeContent(oldIndex);};
		var change = function(obj){oldIndex = index;index = $(obj).index();_style();changeContent(oldIndex);};
		var changeContent = function (oldIndex){var data = _listBox.eq(index).attr('data');$(params.element).attr('src', data);_listBox.eq(oldIndex).removeClass(params.className);_listBox.eq(index).addClass(params.className);};
		_style();
		return this.each(function(){if(params.changeType == 'click'){$(this).click(function(){change(this);});}else{$(this).bind('mouseenter',function(){change(this);});}});
	};
	$.fn.sidebar = function(){
		return this.each(function(){
			$(this).children('a').eq(0).click(function(){
				var element = $(this).parent().children('ul');
				var className = $(element).attr('class');
				$(element).slideToggle();
				var text = $(this).children().eq(0).html();
				if(text == ']')
				{
					$(this).children().eq(0).html('}');
				}else{
					$(this).children().eq(0).html(']');
				}
			});
		});
	};
	$.fn.share = function(options){
		var options = $.extend({}, {size:16,hasText	:true}, options);
		var shareico = {
				"tencent":"http://v.t.qq.com/share/share.php?title={title}&url={url}&appkey=c0af9c29e0900813028c2ccb42021792",
				"sina":"http://service.weibo.com/share/share.php?title={title}&url={url}&appkey=3739328910&searchPic=true",
				"qzone":"http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url={url}&title={title}",
				"renren":"http://share.renren.com/share/buttonshare.do?link={url}&title={title}",
				"baidu":"http://cang.baidu.com/do/add?it={title}&iu={url}&fr=ien#nw=1",
				"115":"http://sc.115.com/add?url={url}&title={title}",
				"tsohu":"http://t.sohu.com/third/post.jsp?url={url}&title={title}&content=utf-8",
				"taobao":"http://share.jianghu.taobao.com/share/addShare.htm?url={url}",
				"xiaoyou":"http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?to=pengyou&url={url}",
				"hi":"http://apps.hi.baidu.com/share/?url={url}&title={title}",
				"fanfou":"http://fanfou.com/sharer?u={url}&t={title}",
				"sohubai":"http://bai.sohu.com/share/blank/add.do?link={url}",
				"feixin":"http://space3.feixin.10086.cn/api/share?title={title}&url={url}",
				"youshi":"http://www.ushi.cn/feedShare/feedShare!sharetomicroblog.jhtml?type=button&loginflag=share&title={title}&url={url}",
				"tianya":"http://share.tianya.cn/openapp/restpage/activity/appendDiv.jsp?app_id=jiathis&ccTitle={title}&ccUrl={url}&jtss=tianya&ccBody=",
				"msn":"http://profile.live.com/P.mvc#!/badge?url={url}&screenshot=",
				"douban":"http://shuo.douban.com/!service/share?image=&href={url}&name={title}",
				"twangyi":"http://t.163.com/article/user/checkLogin.do?source={title}&info={title}+{url}&images=",
				"mop":"http://tk.mop.com/api/post.htm?url={url}&title={title}",
				'qq':"http://connect.qq.com/widget/shareqq/index.html?title={title}&url={url}&desc={desc}"};
		var shareiconame = {"tencent":"腾讯微博","sina":"新浪微博","qzone":"QQ空间","renren":"人人网","baidu":"百度收藏","115":"115","tsohu":"搜狐微博","taobao":"淘江湖","xiaoyou":"腾讯朋友","hi":"百度空间","fanfou"	:"饭否","sohubai":"搜狐白社会","feixin":"飞信","tianya":"天涯社区","youshi":"优士网","msn":"MSN","douban":"豆瓣","twangyi":"网易微博","mop":"猫扑推客","qq":"QQ好友"};
		this.each(function(){
			var title = document.title;
			var url = window.location.href;
			function eFunction(str){return function(){window.open(formatmodel(shareico[str],{title:title, url:url,desc:title}));}}
			function formatmodel(str,model){for(var k in model){var re = new RegExp("{"+k+"}","g");str = str.replace(re,model[k]);}return str;}
			for(si in shareico){$(".share-"+si).die('click').live('click',eFunction(si)).attr("title","分享到"+shareiconame[si]);if(options.hasText){$(".share-"+si).text(shareiconame[si]);}}
		});
	};
	$.fn.search = function(apiDomain){
		var query_num = 0;
		var list_index = 0;
		var tmp_list = 0;
		function getKeywords(obj){
			var key = $.trim($(obj).val());
			key = key.replace(new RegExp("'","gm"),'');  //去掉特殊字符
			if(key == ''){
				$(obj).parent().children('ul').hide();
				return false;
			}
        	key = encodeURI(key);   //编码
        	$.get(apiDomain + '/autocomplete?callback=?&key=' + key, function(htmlData){
        		$(obj).parent().children('ul').html(htmlData);
				query_num = $(obj).parent().children('ul').children('li').length;
				list_index = -1;
				if(query_num > 0) {
					$(obj).parent().children('ul').show();
				} else {
					$(obj).parent().children('ul').hide();
				}
				//绑定事件					
				$(obj).parent().children('ul').find('a').hover(function(){$(this).css("background-color", "#eee");},function(){$(this).css("background-color", "#fff");});
			},'jsonp');
		}
		
		function getText(obj){
	        $(obj).parent().children('ul').children("li:eq(" + tmp_list + ") a").css("background-color","#fff");
	        $(obj).parent().children('ul').children("li:eq(" + list_index + ") a").css("background-color","#eee");
	        var text = $(obj).parent().children('ul').children("li:eq(" + list_index + ") a").attr("title");
	        $(obj).val(text);
		}
		
		return this.each(function(){
			$(this).keyup(function(event){
				if(event.which == 38){
					if(query_num == 0){
						return false;
					}
					if(list_index == -1){list_index = 0;} 
			        var tmp_list = list_index;
			        list_index = (list_index - 1 + query_num)%query_num;
					getText(this);
				}else if(event.which == 40){
					if(query_num == 0){
						return false;
					}
					var tmp_list = list_index;
			        list_index = (list_index + 1)%query_num;
			        getText(this);
				}else if(event.which == 13){
					var actUrl = $(this).parent().children('ul').children("li:eq(" + list_index + ") a").attr("act");
			        if(actUrl == undefined) {
			        	$(this).parent().submit();
			        } else {
			        	window.location.href = actUrl;
			        }
				}else{
					getKeywords(this);
				}
			});
		});
	};
	$.fn.showNav = function(){
		return $(this).each(function(){
			$(this).mouseenter(function(){$(this).addClass('cur');if($(this).find('div').length == 0){return false;}$(this).find('div').show();});
			$(this).mouseleave(function(){$(this).removeClass('cur');if($(this).find('div').length == 0){return false;}$(this).find('div').hide();});
		});
	};
	
})(jQuery);
/**
 * 图片延迟加载
 */
(function(a,b){$window=a(b),a.fn.lazyload=function(c){function f(){var b=0;d.each(function(){var c=a(this);if(e.skip_invisible&&!c.is(":visible"))return;if(!a.abovethetop(this,e)&&!a.leftofbegin(this,e))if(!a.belowthefold(this,e)&&!a.rightoffold(this,e))c.trigger("appear");else if(++b>e.failure_limit)return!1})}var d=this,e={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null};return c&&(undefined!==c.failurelimit&&(c.failure_limit=c.failurelimit,delete c.failurelimit),undefined!==c.effectspeed&&(c.effect_speed=c.effectspeed,delete c.effectspeed),a.extend(e,c)),$container=e.container===undefined||e.container===b?$window:a(e.container),0===e.event.indexOf("scroll")&&$container.bind(e.event,function(a){return f()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,c.one("appear",function(){if(!this.loaded){if(e.appear){var f=d.length;e.appear.call(b,f,e)}a("<img />").bind("load",function(){c.hide().attr("src",c.data(e.data_attribute))[e.effect](e.effect_speed),b.loaded=!0;var f=a.grep(d,function(a){return!a.loaded});d=a(f);if(e.load){var g=d.length;e.load.call(b,g,e)}}).attr("src",c.data(e.data_attribute))}}),0!==e.event.indexOf("scroll")&&c.bind(e.event,function(a){b.loaded||c.trigger("appear")})}),$window.bind("resize",function(a){f()}),f(),this},a.belowthefold=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.height()+$window.scrollTop():e=$container.offset().top+$container.height(),e<=a(c).offset().top-d.threshold},a.rightoffold=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.width()+$window.scrollLeft():e=$container.offset().left+$container.width(),e<=a(c).offset().left-d.threshold},a.abovethetop=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.scrollTop():e=$container.offset().top,e>=a(c).offset().top+d.threshold+a(c).height()},a.leftofbegin=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.scrollLeft():e=$container.offset().left,e>=a(c).offset().left+d.threshold+a(c).width()},a.inviewport=function(b,c){return!a.rightofscreen(b,c)&&!a.leftofscreen(b,c)&&!a.belowthefold(b,c)&&!a.abovethetop(b,c)},a.extend(a.expr[":"],{"below-the-fold":function(c){return a.belowthefold(c,{threshold:0,container:b})},"above-the-top":function(c){return!a.belowthefold(c,{threshold:0,container:b})},"right-of-screen":function(c){return a.rightoffold(c,{threshold:0,container:b})},"left-of-screen":function(c){return!a.rightoffold(c,{threshold:0,container:b})},"in-viewport":function(c){return!a.inviewport(c,{threshold:0,container:b})},"above-the-fold":function(c){return!a.belowthefold(c,{threshold:0,container:b})},"right-of-fold":function(c){return a.rightoffold(c,{threshold:0,container:b})},"left-of-fold":function(c){return!a.rightoffold(c,{threshold:0,container:b})}})})(jQuery,window)

function colorPopupCreate() {
    popID = "#colorPopBox";THUMBWIDTH = 50;OPENSPEED = 1;COLORSPEED = 200;var l = 0;
    if (jQuery.browser.version == "6.0" || jQuery.browser.version == "7.0") {var j = "old"}
    if (j == "old") {COLORSPEED = 0}
    if (!$(".popstatus").val()) {$(popID).after('<input type="hidden" class="popstatus" value="off" />');}
    $(".goods-info").unbind();
    $(".goods-info").hover(function() {thisBox = this;if ($(thisBox).find("#colorList").html()) {idx = $(".goods-info").index(thisBox);$(thisBox).mousemove(function(a) {if ($(".popstatus").val() == "off") {clearTimeout(l);l = setTimeout(h, OPENSPEED);}});$(popID).hover(function() {$(".popstatus").val("on");}, function() {g("over");});} else {g("over");}}, function() {if ($(".popstatus").val() == "off") {g("over");} else {g();}});
    
    function h() {
        clearTimeout(l);
        $(thisBox).children().each(function() {var html = $(this).html();var _id = $(this).attr("id");$(popID).children('.goods').children(" #" + _id).html(html);});
        $(popID).children("#colorList").html($(thisBox).children("#colorList").html());
        i = 0;row = 4;
        var a = thumb = new Array();
        $(popID + " #colorList").find("a").each(function(b) {a[b] = new Image();a[b].src = $(this).attr("rel");thumb[b] = new Image();thumb[b].src = $(this).find("img").attr("src");$(this).wrap("<li></li>");});
        for (i = 0; i < $(popID).children("#colorList").find("li").size(); i = i + row) {$(popID + " #colorList").find("li").slice(i, i + row).wrapAll('<ul style="float: left; width: ' + (THUMBWIDTH + 1) + 'px;"></ul>');}
        $(popID + " #colorList").html('<div class="cf">' + $(popID).children("#colorList").html()+ "</div>");
        $('.cf').find('img').each(function(){
        	$(this).attr('src', $(this).attr('data-original'));
        });
        $(popID).find('a[name="goods_favor"]').show();
        ulSize = $(popID).children("#colorList").find("ul").size();
        colorListWidth = ulSize * (THUMBWIDTH) + ulSize;
        var thisBoxWidth = $(thisBox).width();
        if (j == "old") {windowSize = thisBoxWidth + colorListWidth + 16;$(popID).width(windowSize);}$(popID + " #colorList").width(0);$(popID + " #colorList > div").width(colorListWidth);pos = $(thisBox).offset();spw = 60;
		$(popID + " .goods").width(thisBoxWidth+1).height($(thisBox).height());if ($("body").width() < (thisBoxWidth + pos.left + colorListWidth + spw)) {pos.left = $("body").width() - thisBoxWidth - colorListWidth - spw;}
        pos.top = pos.top - $("#searchResultList").offset().top;pos.left = pos.left - $("#searchResultList").offset().left;var popDivWidth = thisBoxWidth + colorListWidth + 20;$(popID).width(popDivWidth);
        $(popID).css({top : pos.top + "px",left : pos.left + "px"});
        $(".popstatus").val("on");
        $(popID).show();
        $.favProduct(apiDomain,"a[name='goods_favor']",function(className,fav){if(className != ''){$(thisBox).children('div').eq(0).children('div').eq(1).removeClass('favored').removeClass('favor').addClass(className);$(thisBox).children('div').eq(0).children('div').eq(1).children('a').attr('fav', fav);}});
        
        $(popID + " #colorList").animate({width : colorListWidth + "px"},COLORSPEED,function() {$(popID + " #colorList ul").find("li").each(function() {$(this).find("a").mouseover(function() {$(popID + " #relative img").attr("src",$(this).attr("rel"));});});});
    }
    function g(a) {$(".popstatus").val("off");clearTimeout(l);$(popID + " .color").clearQueue();$(popID + " #colorList").clearQueue();if (a) {$(popID + " #colorList").width(0);$(popID).hide();}}function k(a) {return a;}
}
window.Qinshare = function (options) {
        var _this = this;
        var openUrl = '';
        var defOption = {
            title:'',
            url:window.location.href,
            image:'',
            desc:'',
            channel:'weibo'
        };
        var shareChannels = ['weibo', 'tqq', 'qzone', 'renren', 'qq', 'douban'];
        defOption = $.extend(defOption, options);
        this.weibo = function () {
            openUrl = 'http://service.weibo.com/share/share.php?url='+defOption.url+'&title='+defOption.title+'&appkey=3739328910&searchPic=true&pic='+defOption.image;
        };
        this.tqq = function () {
            openUrl = 'http://share.v.t.qq.com/index.php?c=share&a=index&url='+defOption.url+'&title='+defOption.title+'&appkey=c0af9c29e0900813028c2ccb42021792&pic='+defOption.image;
        };
        this.qzone = function () {
            openUrl = 'http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+defOption.url+'&title='+defOption.title+'&desc=&summary='+defOption.desc+'&site=YOHO!有货&pics='+defOption.image;
        };
        this.renren = function () {
            openUrl = 'http://widget.renren.com/dialog/share?resourceUrl='+defOption.url+'&srcUrl='+defOption.url+'&title='+defOption.title+'&description='+defOption.desc+'&pic='+defOption.image;
        };
        this.qq = function () {
            openUrl = 'http://connect.qq.com/widget/shareqq/index.html?url='+defOption.url+'&title='+defOption.title.replace('%', '')+'&desc=&summary='+defOption.desc+'&site=YOHO!有货&pics='+defOption.image;
        };
        this.douban = function () {
            openUrl = 'http://www.douban.com/share/service?href='+defOption.url+'&text='+defOption.desc+'&image='+defOption.image+'&title='+defOption.title+'&comment=';
        };
        if ($.inArray(defOption.channel, shareChannels) == -1) {
            alert('不存在的分享平台!');
            return false;
        }
        eval(defOption.channel+'();');
        window.open(encodeURI(openUrl));
    };
