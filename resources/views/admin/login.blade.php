<!doctype html>
<html>
<head>
<title>Look at me Login</title>
</head>
<body>
	<form method="POST" action="{{ route("admin.login") }}">
		{{ csrf_field() }}
		<h1>Login</h1>
		<input type="email" name="email" placeholder="Email ..." required>
		<input type="password" name="password" placeholder="Password ..." required>
		<button type="submit">Login</button>
	</form>
</body>
</html>