$(document).ready(function () {
	$("#scrolltop1").click(function() {
		swiperNested1.swipeTo(0);
		swiperNested1.reInit();
	});
	$("#scrolltop2").click(function() {
		swiperNested2.swipeTo(0);
		swiperNested2.reInit();
	});
	$("#scrolltop3").click(function() {
		swiperNested3.swipeTo(0);
		swiperNested3.reInit();
	});
	$("#scrolltop4").click(function() {
		swiperNested4.swipeTo(0);
		swiperNested4.reInit();
	});
	$("#scrolltop5").click(function() {
		swiperNested5.swipeTo(0);
		swiperNested5.reInit();
	});
	$("#scrolltop6").click(function() {
		swiperNested6.swipeTo(0);
		swiperNested6.reInit();
	});

	$('.gohome').click(function(){
		swiperParent.swipeTo(0);
	});
	
	$('.student').click(function(){
		swiperParent.swipeTo(5);
	});

	$(".toggle_container").hide();
	$(".trigger").click(function(){
		$(this).toggleClass("active").next().slideToggle("slow");
		swiperNested4.reInit();
		return false;
	});

    $('.form').find('input, select, textarea').on('touchstart mousedown click', function(e){
        e.stopPropagation();
    });
});