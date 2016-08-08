$('.form-selector').click(function() {
	$('.select-a-form').fadeOut();
	$('.contact-forms-area').append("<div class='form-spinner'><span class='fa fa-spinner fa-pulse'></span></div>");
	var formType = $(this).attr('data-form-type');
	var formTypeNew = '#' + formType + 'Form';
	setTimeout( function() {
		$('.form-spinner').remove();
		$(formTypeNew).fadeIn();
	}, 1000);
});
$('.form-back').click(function() {
		$('.contact-form').fadeOut();
		$('.contact-forms-area').append("<div class='form-spinner'><span class='fa fa-spinner fa-pulse'></span></div>");
		setTimeout( function() {
			$('.form-spinner').remove();
			$('.select-a-form').fadeIn();
		}, 1000);
});