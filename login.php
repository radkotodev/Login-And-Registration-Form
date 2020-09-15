<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Вход</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Вход</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Потребителско име :</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Парола :</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Вход</button>
  	</div>
  	<p>
  		Все още не сте член ? <a href="register.php">Регистрация</a>
  	</p>
  </form>
</body>
</html>