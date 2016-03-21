var username = "";
	function send_message(message){
		var prevState = $("#container").html();
		//$("#container").html(username + message);
		console.log(prevState.length );
	if (prevState.length > 1){
		prevState = prevState + "<br>";
	}
	$("#container").html(prevState + "<span class='current_message'>" +"<span class = 'bot'>Chatbot: </span>" + message);

	$(".current_message").hide();
	$(".current_message").delay(500).fadeIn();
	$(".current_message").removeClass("current_message") ;
	}

	function get_username(){
		send_message("Hello, whats your name");
	}
	function ai(message){
		if (username.length<3){
			username = message;
			send_message("Nice to meet you " + username + ", how are you doing?");
		}
		if(message.indexOf("how are you")>= 0){
			send_message("Thanks, I am good!!");
		}
		if(message.indexOf("hows life?")>=0){
			send_message("great!!");
		}
		if((message.indexOf("time")>=0) || (message.indexOf("hours")>=0)){
			var date = new Date();
			var h = date.getHours();
			var m = date.getMinutes();
			send_message("Current time is: " + h + ":"+ m);
		}
		if(message.indexOf("weather")>=0){
			send_message("hot");
		}
	}

	$(function(){
		
		get_username();

		$("#textbox").keypress(function(event){
			if(event.which == 13){
				if($("#enter").prop("checked")){
					//console.log("enter pressed, checkbox cheked");
					//prevents the newline from getting created
					$("#send").click();
					event.preventDefault();
				}
			}
		});

		//track event when user click event
		$("#send").click(function(){
			var username = "<span class='username'>You: </span>";
			var newMessage = $("#textbox").val();
			$("#textbox").val("");
			var prevState = $("#container").html();

			if (prevState.length > 3){
				prevState = prevState + "<br> ";
			}

			$("#container").html(prevState + username + newMessage);

			$("#container").scrollTop($("#container").prop("scrollHeight"));

			ai(newMessage);


		});
	});