$(document).ready(function() {

	$("#href_settings").attr("href", OC.generateUrl('/settings/personal#' + t('passwords', 'Passwords').toLowerCase()));

	$('#auth_btn').val(t('core', 'Continue'));
	$('#auth_pass').focus();
	
	$("#auth_form").on("submit", function() {
		if ($('#auth_pass').val() == '') {
			return false;
		}
		if ($('#auth_pass').attr('placeholder') == t('passwords', 'Master password')) {
			var uid = $('head').attr('data-user');
			window.location = OC.generateUrl('/apps/passwords/') + '?token=' + SHA512(uid + SHA512($('#auth_pass').val()));
			return false;
		} else {
			alert('OC pass not yet implemented...');
		}
		return false;
	});

	setTimeout(function() {
		$('#invalid_auth').slideUp(500);
	}, 4500);

});
