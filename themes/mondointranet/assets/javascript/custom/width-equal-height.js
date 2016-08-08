function newsImgHeight() {
	var newsImgWidth = $('.news-item-img').width();
	$('.news-item-img').css({'height':newsImgWidth+'px'});
}
$(document).ready( newsImgHeight() );
$(document).ready( function() {
	$(window).resize( newsImgHeight() ); 
});