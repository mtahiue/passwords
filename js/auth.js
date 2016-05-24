$(document).ready(function() {

	$('#auth_btn').val(t('core', 'Continue'));
	$('#auth_pass').focus();

	$('#auth_btn').click(function() {
		var uid = $('head').attr('data-user');
		window.location = OC.generateUrl('/apps/passwords/') + '?token=' + SHA512(uid + SHA512($('#auth_pass').val()));
	});

	setTimeout(function() {
		$('#invalid_auth').slideUp(500);
	}, 4500);

});
