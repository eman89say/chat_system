<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Document</title>

		<link rel="stylesheet" type="text/css" href="style.css">

		<script src="https://code.jquery.com/jquery-3.2.1.js"
                integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                crossorigin="anonymous">
        </script>

       

	</head>
	<body>

		<?php
             session_start();
             $_SESSION['username']="Eman";


		?>

		
		<div id="wrapper">
			<h1>Welcome to My website</h1>
			<div class="chat_wrapper">
				<div id="chat"></div>
				<form method="POST" id="msgFrm">
					<textarea name="message" cols="25" rows="7" class="textarea" placeholder="Please Type a message to send"></textarea>
				</form>
			</div>
		</div>


		<script type="text/javascript">

			loadChat();

			setInterval(function(){
       
			}, 1000);

			function loadChat(){
				$.post('handlers/message.php?action=getMessages',function(response){
                    $('#chat').html(response);
                     $('#chat').scrollTop($('#chat').prop('scrollHeight'));
				});
			}

        	$('.textarea').keyup(function(e){
        		if(e.which == 13){
                   $('form').submit();
        		}
        	});


        	   $('form').submit(function(){

        	   	    var message = $('.textarea').val();
                    $.post('handlers/message.php?action=sendMessage&message='+ message,function(response){
                    	
                    	if(response==1){
                    		loadChat();
                    		document.getElementById('msgFrm').reset();
                    	}
                    });

                    return false;
        	   });


        </script>
		
	</body>
</html>