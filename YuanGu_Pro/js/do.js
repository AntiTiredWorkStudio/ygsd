$(document).ready(function(){
	
/*	$('#xin').click(function(){
		//alert("xxx");
		$("#xin_nr").slideToggle("slow");
		$('#xin_nn').toggleClass("change");
		//alert( $(".Amount").value);
		return false;
   });
   $('#xin1').click(function(){
		//alert("xxx");
		$("#xin_nr1").slideToggle("slow");
		$('#xin_nn1').toggleClass("change");
		return false;
   });
   $('#xin2').click(function(){
		//alert("xxx");
		$("#xin_nr2").slideToggle("slow");
		$('#xin_nn2').toggleClass("change");
		return false;
   });
    $('#xin3').click(function(){
		//alert("xxx");
		$("#xin_nr3").slideToggle("slow");
		$('#xin_nn3').toggleClass("change");
		return false;
   });*/
	   
	   
	$(function(){
	var kc=8;//定义库存
	$(".jian").click(function(){//当点击减时
	var t=$(this).parent().find('input[class*=text_box]');
	//定义当前按钮父标签下面所有包含text_box的元素
	t.val(parseInt(t.val())-1);//点击时购物数量减一
	if(parseInt(t.val())<1)//当购物数量小于1时，最低必须购物一件
	{
		t.val(0);//购物数量为0
		$(this).attr("disabled",true);
	}
	setTotal();
	});
	//上面减结束
	$(".jia").click(function(){
	var t=$(this).parent().find('input[class*=text_box]');
	t.val(parseInt(t.val())+1);
	$('.jian').attr("disabled",false);
	if(parseInt(t.val())>kc)//当购物数量大于库存时，我们就把库存所有给他
	{
		t.val(kc);
	}
	setTotal();
	});
	//在这里调一次是因为防止用户因为退回页面而下空订单
	setTotal();
	function setTotal()
	{
		var s=0;
		$(".menu_list .fen").each(function(){//循环
			//console.log("xxx");
	    s+=parseInt($(this).find('input[class*=text_box]').val())*parseFloat($(this).find('b[class*=price]').text());
	//数量乘以单价
	});
	$(".tol b").html(s.toFixed(2));//保留二位小数
	}
	});

});


