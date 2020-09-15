<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Регистрация</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Регистрация</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Потребителско име :</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
	<div class="input-group">
  	  <label>Факултетен номер :</label>
  	  <input type="text" name="fnumber" value="<?php echo $fnumber; ?>">
  	</div>
		<div class="input-group">
  	  <label>Име :</label>
  	  <input type="text" name="name" value="<?php echo $name; ?>">
  	</div>
	</div>
		<div class="input-group">
  	  <label>Презиме :</label>
  	  <input type="text" name="sname" value="<?php echo $sname; ?>">
  	</div>
	<div class="input-group">
  	  <label>Фамилия :</label>
  	  <input type="text" name="lname" value="<?php echo $lname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Имейл :</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Парола :</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Потвърди парола :</label>
  	  <input type="password" name="password_2">
  	</div>
	<div class="input-group">
  	  <label>Специалност :</label>
  	  <input type="text" name="specialty" value="<?php echo $specialty; ?>">
  	</div>
	
	Курс :
<select name = "course"> 
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
Форма на обучение :
<select name = "education"> 
<option value="redovno">редовно</option>
<option value="zadochno">задочно</option>
</select>
	
	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Регистрация</button>
  	</div>
		<div class="input-group">
  	  <button type="submit" class="btn" name=""> <a href = "login.php" id="dee">Назад</a></button>
  	</div>
  	  
 

  	<p>
  		Вече сте член? <a href="login.php" >Влез</a>
		
  	</p>
  </form>
</body>
</html>