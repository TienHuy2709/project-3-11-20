$('.thumbnails li a img').click(function(){
$('.thumbnails li a img').removeClass('active');
$(this).addClass('active');
})
$('.menu-size li').click(function(){
$('.menu-size li').removeClass('active');
$(this).addClass('active');
 $size=$(this).html();

 $("#size").val( $size);

})
var tab_detail= $('.tab-detail').offset().top;
var tab_cmt= $('.tab-cmt').offset().top;
$('.go-detail').click(function(event) {
	$('.tab-detail').addClass('active');
	$('.nd-detail').addClass('show active');
	$('.tab-cmt').removeClass('active');
	$('.nd-cmt').removeClass('show active');
		$('html,body').animate({
			scrollTop: tab_detail-120},
			1200);
	});
$('.danh-gia').click(function(event) {
	$('.tab-cmt').addClass('active');
	$('.nd-cmt').addClass('show active');
	$('.tab-detail').removeClass('active');
	$('.nd-detail').removeClass('show active');
		$('html,body').animate({
			scrollTop: tab_cmt-120},
			1200);
	});
$('.imgthuc li').click(function(){
$('.imgthuc li').removeClass('active');
$(this).addClass('active');
})