<!DOCTYPE html>
<html>
<head>
	<title>Send Mail</title>
</head>
<body>
	<form method="POST" action="{{ route("mail.send") }}">
		<label>Email:</label>
		<input type="email" name="email">

		<button type="submit">Send</button>
	</form>
</body>
</html>