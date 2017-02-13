$(document).ready(function() {

	// handle navigation for responsiveness on mobile devices
	var width = $(window).innerWidth();
	if(width > 767) {
		$("#menu-button").hide();
		$("#navigation").show();
	}
	else {
		$("#menu-button").show();
		$("#navigation").hide();
	}

	$("#menu-button").click(function() {
		$("#navigation").toggle(300);
	});

	// Define min height for the contents
	var top_height = $("#title").height() + $("#navigation").height();
	var cont_height = ($(window).height() - top_height) + "px";
	$("#content").css("min-height", cont_height);
});