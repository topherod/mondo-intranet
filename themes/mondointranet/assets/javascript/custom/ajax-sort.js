$('.sort-button').click( function() {
	if ( $(this).hasClass('active') ) {
		if ( $(this).hasClass('desc') ) {
			$(this).removeClass('desc');
			$('#order').val('ASC');
		} else {
			$(this).addClass('desc');
			$('#order').val('DESC');
		}
	} else {
		$('.sort-button').removeClass('active');
		$(this).addClass('active');
		$('#order').val('ASC');	
	}
	$("#documentList").html("<div class='ajax-spinner'><span class='fa fa-spinner fa-pulse'></span></div>");
	var sortValue = $(this).attr('id');
	$('#sort_value').val(sortValue);
	$('#sort_form').submit();
});

$('#sort_form').submit(ajaxSubmit);
function ajaxSubmit() {
	var sortData = jQuery(this).serialize();

	jQuery.ajax({
	type:"POST",
	url: "/wp-admin/admin-ajax.php",
	data: sortData,
	success:function(data){
	jQuery("#documentList").html(data);
	}
	});

	return false;
}