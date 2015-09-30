$(document).ready(function(){
	$('#logIn').click(function(){
		var userid = $.trim($('#userid').val());
		if(userid == ''){
			alert('请输入用户名');
			$('#userid').focus();
			return;
		}
		var password = $.trim($('#password').val());
		if(password == ''){
			alert('请输入密码');
			$('#password').focus();
			return;
		}
		$(this).attr('disabled', true);
		$.post('/User/login.html', {userid: userid, password: password}, function(data){
			$('#logIn').removeAttr('disabled');
			switch(data){
				case 'success':
					location.href='/';
					break;
				case 'badpwd':
					alert('用户名/密码错误，请重试');
					break;
				default:
					alert('提交过程发生错误，请联系管理员');
			}
		})
	})
})