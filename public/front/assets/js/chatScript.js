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
	/* for the sender himself
	y3ny dah ly by7sl 3nd ly b3t l msg */
	function whenSend(){
		$("#send").click(function(){
			$.ajax({
				url:"/chat/set-msg",
				type:"post",
				data:{
					msg: $("#textbox").val(),
					_token: $('body [token]').attr('token')
				},
				success: function (data){
					var prevMessage = $("#content").html();
					 $("#content").append("You : "+data+"<br>");
					 $("#textbox").val("");
					},
				error:   function(){
					alert("error");
				}        

			});

		});
	}	
	whenLoad();		
	whenSend();
//});