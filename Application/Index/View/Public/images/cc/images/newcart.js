
var cart = 
	{
		//
		addCartBut:false,
		//是否强制加载的标记
		isForceLoad : 1,
		
		//是否选择了所有的赠品
		isSelectallGift : 1,
		//用于购买按钮
		buy : function(callbackFunc){
			if(this.addCartBut == true)
			{
				return false;
			}
			var product_id = $('#product_id').val();
			var goods_id = $('#goods_id').val();
			var size_id = $('#size_id').val();
			var num = $('#num').val();
			var promotion_id = $('#promotion_id').val();
			if(goods_id == 0){
				QGlobal.UI.alertWindow('请选择颜色','alertDialog','alertMessageBox',401);
				this.setAddCartButStatus(false);
				return;
			}
			if(size_id == 0){
				QGlobal.UI.alertWindow('请选择尺码','alertDialog','alertMessageBox',401);
				this.setAddCartButStatus(false);
				return;
			}
			if(num < 1) {
				QGlobal.UI.alertWindow('请至少购买一件','alertDialog','alertMessageBox',401);
				this.setAddCartButStatus(false);
				return ;
			}
			if(!this.checkCartLimit(num)){
				QGlobal.UI.alertWindow('您买的商品太多了，请联系我们的客服，专门为您服务','alertDialog','alertMessageBox',401);
				this.setAddCartButStatus(false);
				return;
			}
			this.setAddCartButStatus(true);
			//window.open('http://www.baidu.com', 'baidu');
			this.AddToCart(product_id, goods_id, size_id, num, promotion_id, callbackFunc);
		},
		setAddCartButStatus:function(status){
			this.addCartBut = status;
		},
		checkCartLimit : function(num){
			var cartInfo = eval('(' + $.cookie('_g') + ')');
	        if(cartInfo != null){
	        	if(parseInt(parseInt(cartInfo._n)+ parseInt(num)) > 1000){	        		
	        		return false;
	        	}
	        }
	        return true;
		},
		/**
		 * 折叠或展开加价购
		 */
		switchNeedPayPromotion : function(promotion_id) {
			$.get('/shopping/cart/promotiongift', {promotion_id:promotion_id}, function(data) {
				$('#needPayList' + promotion_id).html(data);
				$('#openBtn' + promotion_id).hide();
				$('#needpayPromotionBanner' + promotion_id).attr('class', 'i_open');
			});
		},
		//向购物车增加商品
		AddToCart : function(product_id, goods_id, size_id, num, promotion_id, callbackFunc){
			$.post('/shopping',{product_id:product_id, goods_id:goods_id,size_id:size_id,num:num,promotion_id:promotion_id}, 
					function(data){
						cart.setAddCartButStatus(false);
						if(data.code == 200){
							eval(callbackFunc + '(200,' + data.data.totalNum + ',' + data.data.totalCost + ',' + data.data.goodsInCartId + ',"")');
						} else{
							eval(callbackFunc + '(' + data.code + ',' + num + ',' + 0 + ',0' +  ',"' + data.message +'")');
						}
					}, 'json');
		},
		
		/**
		 * 购物车页面
		 */
		cartBuyResult : function(resultCode, totalNum, totalCost, goodsInCartId, msg) {
			if(resultCode == 200) {
				cart.loadCartDetail(1, '',goodsInCartId);
				$('#miniProductDialog').dialog('close');
			} else {
				QGlobal.UI.alertWindow(msg,{'code':401});
			}
		},
		
		/**
		 * 商品详情页面显示结果
		 */
		productDetailBuyResult : function(resultCode, totalNum, totalCost, goodsInCartId, msg){		
			if(resultCode == 200) {
				$('#curTotalNum').html(totalNum);
				$('#curTotalCost').html(totalCost);
				$('#shoppingCart').dialog('open');
				$('#shoppingCart').show();
			} else {
				//失败的提示
				QGlobal.UI.alertWindow(msg,{'code':401});
			}			
		},
		
		loadCartDetail : function (customSel, strDelIds,mergeGoodsID) {
			if($('#cartDetail').length > 0) {
				var strBuyIds = '';
				$("input:checkbox[name=aBuyId]:checked'").each(function(i){
					   if(0==i){
						   strBuyIds = $(this).val();
				       }else{
				    	   strBuyIds += (","+$(this).val());
				       }
				});
				$("input:checkbox[name=cBuyId]:checked'").each(function(i){
					   if(0==i){
						   if(strBuyIds != ''){ 
							   //不能同时结算
							   strBuyIds += ','; 
							}
						   strBuyIds += $(this).val();
				       }else{
				    	   strBuyIds += (","+$(this).val());
				       }
				});
                if(typeof(mergeGoodsID) != undefined){
                    strBuyIds += ","+mergeGoodsID;
                }
				$.ajax({
					type : "get",
					url : "/shopping/cart/detail",
					data : {ids:strBuyIds,customSel:customSel,delids:strDelIds},
					cache: false,
					beforeSend : function(XMLHttpRequest) {
						cart.showLoading(1);
					},
					success:function(data) {
						$('#cartDetail').html(data);
					},
					complete : function(XMLHttpRequest, textStatus){
						cart.showLoading(0);
					},
					dataType:"html"					
				});
			}
		},
		//获取选择的ids列表
		getSelIds : function() {
			 var strIds = '';
			 $("input[id^=g_]").each(function(i){
				 var checkStatus = $(this).attr("checked");
				 if(checkStatus) {
					 strIds += $(this).val() + ',';
				 }
			 });
			 return strIds;
		},
		revertRemove : function(id, otherDelIds) {
			$.ajax({
				type : "get",
				url : '/shopping/cart/revertdel',
				data : {id:id},
				cache : false,
				beforeSend : function(XMLHttpRequest) {
					cart.showLoading(1);
				},
				success:function(data) {
					if(data.code == 200){
						 cart.updateCartStatusInHeader();
	                 	 cart.loadCartDetail(1, otherDelIds);
	                 }else {
	                	 QGlobal.UI.alertWindow(data.message,{'code':401});
	                	 cart.loadCartDetail(1, '');
	                 }
				},
				complete : function(XMLHttpRequest, textStatus){
					cart.showLoading(0);
				},
				dataType : "json"
			});
		},
		/**
		 * 批量删除
		 */
		multiRemove : function(id){
			var strIds = this.getSelIds();
			if(strIds == '') {
				alert('请至少选择一个商品');
				return false;
			}
			if(!confirm("确定从购物车中删除所有选中商品？")) {
				return false;
			}
			$.ajax({
				type : "get",
				url : "/shopping/cart/delmulti",
				data : {ids : strIds},
				cache :false,
				beforeSend : function(XMLHttpRequest) {
					cart.showLoading(1);
				},
				success:function(data) {
					if(data.code == 200){
						cart.updateCartStatusInHeader();
	                 	cart.loadCartDetail(1, strIds);
	                 }
				},
				complete : function(XMLHttpRequest, textStatus){
					cart.showLoading(0);
				},
				dataType : "json"
			})
			
		},
		/**
		 * isReduce为1则只是减少数量
		 */
		remove : function(id, isReduce) {
			if(!confirm("确定从购物车中删除此商品？")) {
				return false;
			}
			var toUrl = "/shopping/cart/delone";
			if("undefined" != typeof shopping_delone) {
				toUrl = shopping_delone;
			}
			$.ajax({
				type : "get",
				url : toUrl,
				data : {id:id,is_reduce:isReduce},
				cache: false,
				beforeSend : function(XMLHttpRequest) {
					cart.showLoading(1);
				},
				success:function(data) {
					if(data.code == 200){
						 cart.updateCartStatusInHeader();
						 if(isReduce != 1) {
							 cart.loadCartDetail(1, id);
						 } else {
							 cart.loadCartDetail(0, '');
						 }
	                 }
				},
				complete : function(XMLHttpRequest, textStatus){
					cart.showLoading(0);
				},
				dataType : "json"
			});
		},
		//批量移入收藏夹
		multiMoveToFavorite : function() {
			var strIds = this.getSelIds();
			if(strIds == '') {
				alert('请至少选择一个商品');
				return;
			}
			$.ajax({
				type : "get",
				url : "/shopping/cart/multimovetofavorite",
				data : {ids:strIds},
				cache: false,
				beforeSend : function(XMLHttpRequest) {
					cart.showLoading(1);
				},
				success:function(data) {
					if(data.code == 200){
	                 	cart.loadCartDetail(1,'');
	                 } else {
	                	 alert(data.message);
	                 }	
				},
				complete : function(XMLHttpRequest, textStatus){
					cart.showLoading(0);
				},
				dataType : "json"
			});
		},
 		//从购物车移入收藏
		moveToFavorite : function(id) {
			
			$.ajax({
				type : "get",
				url : "/shopping/cart/movetofavorite",
				data : {id:id},
				cache: false,
				beforeSend : function(XMLHttpRequest) {
					cart.showLoading(1);
				},
				success:function(data) {
					if(data.code == 200){
	                 	cart.loadCartDetail(1, '');
	                 } else {
	                	 alert(data.message);
	                 }	
				},
				complete : function(XMLHttpRequest, textStatus){
					cart.showLoading(0);
				},
				dataType : "json"
			});
		},
		
		
		/**
		 * 清空购物车
		 */
		clearCart : function() {			
			$.ajax({
				type : "get",
				url : "/shopping/cart/clearcart",
				data : {},
				cache: false,
				beforeSend : function(XMLHttpRequest) {
					cart.showLoading(1);
				},
				success:function(data) {
					if(data.code == 200){
						cart.loadCartDetail(0, '');
	                } else {
	                	alert(data.message);
	                }
				},
				complete : function(XMLHttpRequest, textStatus){
					cart.showLoading(0);
				},
				dataType : "json"
			});
		},
		
		/**
		 * 增加数量
		 * maxNum:最大数量限制，如果是-1则为不限制
		 */
		addNum : function(cartItemId, limitNum) {
			if(!this.checkCartLimit(1)){
				QGlobal.UI.alertWindow('您买的商品太多了，请联系我们的客服，专门为您服务','alertDialog','alertMessageBox',401);
				return;
			}
			this.modifyNum(cartItemId, 1, limitNum);
		},
		
		//减少数量
		cutNum: function(cartItemId) {
			this.modifyNum(cartItemId, 2, -1);
		},
		
		//修改商品到制定数量
		modifyNum: function (cartItemId, changeType, limitNum){
			//检查是否达到最大限制
			if(changeType == 1 && limitNum>-1 && limitNum<1) {
					QGlobal.UI.alertWindow('您已经达到该商品的购买限制!','alertDialog','alertMessageBox',401);
					return;
			}
			$.ajax({
				type : "get",
				url : "/shopping/cart/changenum",
				cache: false,
				data : {cartItemId:cartItemId,changeType:changeType},
				beforeSend : function(XMLHttpRequest) {
					cart.showLoading(1);
				},
				success:function(data) {
					if(data.code == 200){
	                 	cart.loadCartDetail(1, '');
	                 } else {
	                	 if(data.data.curNum == 0) {
	                		 cart.remove(cartItemId);	
	                	 }
	                	 else {
	                		 alert(data.message);
	                	 }
	                 }	
				},
				complete : function(XMLHttpRequest, textStatus){
					cart.showLoading(0);
				},
				dataType : "json"
			});
		},
		
		/**
		 * 显示产品
		 */
		showMiniProduct : function(product_id, promotion_price, promotion_id, max_num) {
			$.get('/product/index/mini', {'product_id':product_id, 'price':promotion_price, 'promotion_id':promotion_id, 'max_num':max_num}, function(data) {
				$('#miniProductDialog').html(data);
				$('#miniProductDialog').dialog({ autoOpen: true, width:650 });
			});
		},
		
		recommendsProduct : function(page, obj)
		{
			QGlobal.Page.QSend_Url = '/shopping/cart/recommendsproduct';
			QGlobal.Page.QItem = 'recommendsProduct';
			var str = page;
			QGlobal.Page.getList(str, obj);
		},
		
		/**
		 * 用于防止多次请求的发生
		 */
		updateStatusComplete : 1,
		
		/**
		 * 更新导航头购物车信息
		 */
		autoUpdateCartStatusInHeader : function() {
			this.updateCartStatusInHeader();
			setInterval(this.updateCartStatusInHeader, 500);
		},
		
		/**
		 * 更新页头的购物车信息
		 */
		updateCartStatusInHeader : function (){
			
			if(cart.updateStatusComplete == 0){
				return;  //一次请求还没有结束，需要等结束在请求
			}
			cart.updateStatusComplete = 0;
			
			var cartInfo = eval('(' + $.cookie('_g') + ')');
			if(cartInfo == null) {
				$('#goodsNumInCartShowInHeader').html(0);
				cart.updateStatusComplete = 1;
				return;
			}
			if(cartInfo._r == 1 || cart.isForceLoad == 1) {	
				
				$.ajax({
					  url: '/shopping/cart/mini',
					  data: {},
					  cache: false,
					  dataType: 'html',
					  beforeSend : function(XMLHttpRequest) {
						  $('#miniCartInfo').html("加载中...");
					  },
					  success: function(data){
						  $('#miniCartInfo').html(data);
						  cart.onlyUpdateNum();  
					  },
					  complete : function(data) {
						  cart.isForceLoad = 0;
						  cart.updateStatusComplete = 1;
					  }
				});
			} else {
				cart.updateStatusComplete = 1;
			}
		},
		
		onlyUpdateNum : function() {
			var cartInfo = eval('(' + $.cookie('_g') + ')');
			if(cartInfo == null) {
				$('#goodsNumInCartShowInHeader').html(0);
			} else {
				$('#goodsNumInCartShowInHeader').html(parseInt(cartInfo._nac) + parseInt(cartInfo._ac));
			}
		},
		
		promotionGift: function(page, promotion_id)
		{
			QGlobal.Page.QSend_Url = '/shopping/cart/promotiongift';
			QGlobal.Page.QItem = 'needPayList' + promotion_id;
			var str = page;
			QGlobal.Page.getList(str, promotion_id);
		},
		browse:function(page, obj)
		{
			QGlobal.Page.QSend_Url = '/shopping/cart/browse';
			QGlobal.Page.QItem = 'userViews';
			var str = page;
			QGlobal.Page.getList(str, obj);
		},
		getProdcut:function(page, obj)
		{
			QGlobal.Page.QSend_Url = '/shopping/cart/getproduct';
			QGlobal.Page.QItem = 'orderProduct';
			var str = page;
			QGlobal.Page.getList(str, obj);
		},
		buyProduct:function(page, obj)
		{
			QGlobal.Page.QSend_Url = '/shopping/cart/buyproduct';
			QGlobal.Page.QItem = 'orderBuyProductPage';
			var str = page;
			QGlobal.Page.getList(str, obj);
		},
		/**
		 * 关闭提示
		 */
		closeNotice : function(domId) {
			$('#' + domId).remove();
		},
		
		/**
		 * 检查库存
		 */
		checkStock : function() {
			//检查赠品
			if(cart.isSelectallGift == 0) {
				alert('您有赠品没有选择，请选择完再结算。');
				return ;
			}
			if(QGlobal.Passport.QCheckUserStatus() == false)
			{
				QINRegister.showLoginBox();
				return false;
			}
			
			var strABuyIds = '';
			$("input:checkbox[name=aBuyId]:checked'").each(function(i){
				   if(0==i){
					   strABuyIds = $(this).val();
			       }else{
			    	   strABuyIds += (","+$(this).val());
			       }
			});
			var strCBuyIds = '';
			$("input:checkbox[name=cBuyId]:checked'").each(function(i){
				   if(0==i){
					   strCBuyIds = $(this).val();
			       }else{
			    	   strCBuyIds += (","+$(this).val());
			       }
			});
			if(strABuyIds != '' && strCBuyIds!='') {
				alert('普通商品和预售商品不能同时结算');
				return;
			} else if(strABuyIds=='' && strCBuyIds=='') {
				alert('请至少选择一个要结算的商品');
				return;
			}
			var strBuyIds = strABuyIds == '' ? strCBuyIds : strABuyIds;
			//检查库存
			$.ajax ({
				url : '/shopping/cart/checkstock',
				data: {'ids':strBuyIds},
				cache: false,
				dataType: 'json',
				beforeSend : function(XMLHttpRequest) {
					cart.showLoading(1);
				},
				success : function(jsonData) {
					if(jsonData.code == 412) {
						//订单超过1000
						alert(jsonData.message);
						return;
					}
					else if(jsonData.code == 402) {
						//存在库存不足的，需要进行提示，不能提交
						var strLackList = "";
						if(jsonData.data.length<1) {
							alert('购物车中没有任何商品');
							return;
						}
						for(var i in jsonData.data) {
							if(jsonData.data[i]['isvalid'] == 2) {
								strLackList += " " + $('#productName' + jsonData.data[i]['skuid']).html();
							}
						}
						alert('“' + $.trim(strLackList) + '”库存不足');
						return;
					} else if(jsonData.code == 9000){
						//erp测试机无法连接
					}
					
					location.href = '/shopping/order?t=' + new Date().getTime() + "&ids=" + strBuyIds;
				},
				complete : function(XMLHttpRequest, textStatus){
					cart.showLoading(0);
				}
			});
		},
		
		/**
		 * 显示loading
		 */
		showLoading : function(isShow) {
			if(isShow == 1) {
				$('#loading').show();
			} else {
				$('#loading').hide();
			}
		}
	
};


/**
 * 购物流程的支付页面所用的功能
 */
cart.pay = {
	
		/**
		 * 去支付
		 */
		goPay : function()
		{
		/*	var order_code = $('#order_code').val();
			var payment = $(":radio[name='payment'][checked]").val();
			window.loc	ation = 'http://www.yohobuy.com/pay?order_code=' + order_code + "&payment_type=" + payment; */
			$('#payForm').submit();
			return false;
		},
		
		/**
		 * 选择一个支付方式
		 */
		selPayment : function(paymentId)
		{
			$('#payment_' + paymentId).attr('checked', 'true');
			var paymentName = $('#payimg' + paymentId).attr('alt');
			$('#spanBtnPay').html('使用' + paymentName + '付款');
		}
};

