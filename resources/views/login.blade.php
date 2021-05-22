<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h3>Login</h3>
	<form action="user" method="POST" style="display: flex; flex-direction: column; width: 400px;">
		@csrf
		<input name="username" type="text">
		<input name="password" type="password">
		<button >Sign in</button>
	</div>
</body>
</html>