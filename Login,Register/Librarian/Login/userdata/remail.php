<?php require_once("config.php");?>
<html>
<head>
	<title></title>
	<script src="https://smtpjs.com/v3/smtp.js"></script>  
	<script type="text/javascript">
		function sendEmail() {
			Email.send({
				Host: "smtp.gmail.com",
				Username : "miniprojecthost989@gmail.com",
				Password : "Mini@123",
				//SecureToken : "aba7a08a-0077-41e6-9160-1970d8ffc5b2",
				To : 'hmizan970@gmail.com',
				From : "miniprojecthost989@gmail.com",
				Subject : "Test Subject2",
				Body : "Test body2",
			})
			.then(function(message){
				alert("mail sent successfully")
			});
		}
	</script>
</head>
<body>  
	<form method="post">
		<input type="button" value="Send Email" onclick="sendEmail()"/>
	</form>  
</body>
</html>