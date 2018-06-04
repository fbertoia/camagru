$(document).ready(function() {
	$('.modal-register').submit(function(){
		var name = $('.name-register').val();
		var surname = $('.surname-register').val();
		var login = $('.login-register').val();
		var email = $('.email-register').val();
		var password = $('.password-register').val();
		var password2 = $('.password2-register').val();
		let ret;
		if (password === password2)
		{
			ret = $.ajax({
				type: 'POST',
				url: 'db/controler.php',
				async: false,
				data: {request:"add_user", surname, name, login,email, password},
				success: function(data)
				{
					if (data === "SUCCESS")
						window.location = "main_page.php";
					else
						$(".modal--wrong-input").text(data);
				}
			});
		}
		else
		{
			$(".modal--wrong-input").text("Les mots de passes ne sont pas identiques.");
			$(".password-register").val('');
			$(".password2-register").val('');
		}
	});
	$('.modal-connect').submit(function(){
		return false;
	});
});
