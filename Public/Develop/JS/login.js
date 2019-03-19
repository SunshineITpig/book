$(function(){

	//点击切验证码
	$('#verify_img').click(function() {
		var src = $(this).attr('src');
		$(this).attr({"src" : src + '&' + Math.random()});
	});
	
})
