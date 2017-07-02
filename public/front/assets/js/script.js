function setComment(post_id){
	var comment = $("#txtComment").val();
	$.ajax({

		url:"/add/"+post_id+"/"+comment+"",
		type:"post",
		data:{
			msg:$("#txtComment").val(),
			_token: $('body [token]').attr('token')
		}, 
		success: function(data) {
			$("#divComments").append("<div class='panel-heading descDiv'>"+data+"</div>");
			$("#txtComment").val("");

		},
		error:function(data){
			alert("Error");
		}

	});

}
function EnterAction(id) {
     //13 is enter key
	if(event.which ==13){
		setComment(id);
		event.preventDefault();
	}
}

// Ahmed Sayed
function search_section(){
	$('#navbar-bs .search-section ul > li a').click(function(e){
		var _this = $(this);
		var search_by = _this.attr('search-type');

		$.ajax({
			url: '/search-type/'+search_by,
			type: 'post',
			success: function(data){
				_this.parents('.search-section').find('.search-form')
					.html(data).slideDown(250);
			}
		})

		e.preventDefault();
	})	

	$('.search-form').delegate("button.close", "click", function(){
		$(this).parent().slideUp(250);
	});
}

// Ahmed Sayed
// to make footer always in page down
function response_footer(){
	var body_height = $('body').height();
	var window_height = $(window).height();

	//console.log(body_height+" - "+window_height);

    if(body_height < window_height) {
        $('footer').addClass('fixed-footer');
    } else {
        $('footer').removeClass('fixed-footer');
    }
}

$(function (event) {
	$(".comment").click(function(){
	//	alert('hello');
		var wellClass = $(this).parent().parent().parent().parent();
		//wellClass.find('#edit').show().focus();
		$("#txtComment").focus();
		return false;
	});
	$('.descDiv').mouseover(function(){
		$(this).children('.descBox').show();
	}).mouseout(function(){
		$(this).children('.descBox').hide();
	});
});

$(document).ready(function(){
	search_section();	
	response_footer();

	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
})




////////////////////////////chat Script//////////////////////////
		
function send_message(message){
	var prevMessage = $("#content").html();
	//space length is 3 as if the previous message not null
 	if(prevMessage.length > 3){
 		prevMessage= prevMessage + "<br>";
 		}
 	$("#content").html(prevMessage +"<span class='current_message'>"+"<span class='bot' > ChatBot: </span>" +message+"</span>");
	$('.current_message').hide();
	$(".current_message").delay(500).fadeIn();
	//removeClass to not delay previous messages (not reload it again)
	$('.current_message').removeClass("current_message");
}

//	$(function  () {

	//		$("#textbox").keypress(function(event){
function EnterPress() {
		//13 is enter key
		if(event.which ==13){
			if($("#enter").prop("checked")){
				//do the action of click button send
				$("#send").click();
				//console.log("enter pressed");
				//prevent newline to creat when press enter
				event.preventDefault();
			}
		} 
}

//$( document ).ready(function() {
	
//	});
function whenLoad(){
	/* dah ly by7sl 3nd ly etb3tlo l msg 3shan at2ked kl shwaya lw f msg gdeda abynhalo */
	setInterval(function(){
		$.ajax({
			url: "/chat/status",
			type: "post",
			/* el tokens btt7t m3 l post bs 3shan l security */
			data:{
				_token: $('body [token]').attr('token')
			},
			success: function(data1){
				if(data1 != 0){
					$.ajax({
						url: "/chat/get-last-message",
						type: 'post',
						data:{
							_token: $('body [token]').attr('token')
						},
						success: function(data){
							$("#content").append("Friend : "+data+"<br>");
						}
					})
				}			
			},
			error: function(){
				console.log('error');
			}
		})
	}, 1500);	
}
//	function whenSend(){
	$(function  (event) {
		$("#send").click(function(){
		//	alert('hi');
			$.ajax({
				url:"/chat/set-msg",
				type:"post",
				data:{
					msg: $("#textbox").val(),
					_token: $('body [token]').attr('token')
				},
				success: function (data){
					var prevMessage = $("#content").html();
					 $("#content").append("<b><div style='margin-left:7px;color:black;' > me : "+data+"</div></b>");
					 $("#textbox").val("");
					 $("#noMsgs").fadeOut( "fast" );
  					var elem = document.getElementById('content');
  					elem.scrollTop = elem.scrollHeight;
					},
				error:   function(){
				//	alert("error");
				$('#send').attr('data-target','#myModal');

				}        

			});

		});
	});
//	}	
//	whenLoad();		
//	whenSend();
//});
