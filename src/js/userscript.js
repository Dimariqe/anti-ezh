var commdes=false;
$(document).ready(function() {
	$("#auth").bind("click", function() {
		$("#authdialog").remove();
		$.get("/ajax/auth/view/form/", function(data){
			$("body").append(data);
			$("#authdialog").dialog({
				autoOpen: true,
				show: "fade",
				hide: "fade",
				modal: true,
				buttons: {
					"Войти": function() {
						$("#form_auth").submit();
					}
		
				}
			});
		});
		return false;
    });
	
	$("#map").css({height: $(window).height()-220});
	$("#article").cleditor();
	$("#content").cleditor();
    $.cleditor.defaultOptions.width = 300;
    $.cleditor.defaultOptions.height = 200;
	$.cleditor.defaultOptions.controls = "bold italic underline strikethrough";
	$("#text").cleditor();
	$("#title").syncTranslit({destination: "slug"});

	$("#comment_submit").bind("click", function() {
		if(commdes==true) return;
		$.post($("#comment_post").attr("action"), $("#comment_post").serialize(),
			function(data) {
				if(data.ok==1) {
					updatecomm($("#postcat").val());
				} else alert(data.error);
			}, "json");
	});
        $("a.deletecomm").click( function() {
            $.get("/ajax/comment/delete/"+$(this).attr("id"));
            $.ajaxSetup({
                cache: false
            });
            $("div.#comm"+$(this).attr("id")).hide("fast");
            return false;
        });
		
		$(".replcomm").bind("click", function(replcomm) {
			$("#poctrepl").val($(this).attr("id"));
			$("#postcommadd").html("<b>Ответ на комментарий номер "+$("#poctrepl").val()+"</b>");
        });
        

});
function updatecomm(commcont) {
		commdes = true;
		setTimeout(function() { commdes = false; }, 5000);
	$.get("/ajax/comment/view/"+commcont, function(data){
		$("#commentaries").html(data);
		$('html,body').animate({ scrollTop: $("#commhead").offset().top }, { duration: 'slow', easing: 'swing'});
	}, "html");

}
$(window).resize(function(){
	$("#map").css({height: $(window).height()-220});
});