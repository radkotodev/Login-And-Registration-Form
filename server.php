<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$name="";
$sname="";
$lname="";
$fnumber="";
$specialty="";
$numbers="";
$education="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'myregistration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $fnumber = mysqli_real_escape_string($db, $_POST['fnumber']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $sname = mysqli_real_escape_string($db, $_POST['sname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $specialty = mysqli_real_escape_string($db, $_POST['specialty']);
  $course = mysqli_real_escape_string($db, $_POST['course']);
  $education = mysqli_real_escape_string($db, $_POST['education']);
  
    // foreach ($_POST['Number'] as $select)
//{//
//echo "You have selected :" .$select; // Displaying Selected Value
//}//
  
  	        if(strlen($username) < 5 || strlen($username > 20)) {
				$errors[] = "Дължината на потребителското име трябва да е от 5 до 20 символа";
				
			}
			if(strlen($fnumber) < 10 ) {
				$errors[] = "Факултетния номер - точно 10 символа !";
				
			}
			if(strlen($name) > 100 ) {
				$errors[] = " Име - максимална дължина 100 символа!";
				
			}
			$result = preg_match("#[a-z]+#", $password_1 );
			if($result == 0) {
				$errors[] = "Паролата трябва да съдържа  една малка  латинска буква";
			}
			$result4 = preg_match("#[A-Z]+#", $password_1 );
			if($result4 == 0) {
				$errors[] = "Паролата трябва да съдържа  една голяма  латинска буква";
			}
			$result2 = preg_match("#[0-9]+#" , $password_1 );
			if ( $result2 == 0 ) {
		          $errors[] = "Паролата трябва да съдържа поне една цифра";
	        }
	        $result3 = preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/" , $password_1 );
			if ( $result3 == 0 ) {
		           $errors[] = "Паролата трябва да съдържа поне един специален символ";
	        }
			if(strlen($specialty) > 100 ) {
				$errors[] = " Специалност - максимална дължина 100 символа!";
				
			}
			
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Потребителско име - задължително поле !"); }
  if (empty($fnumber)) { array_push($errors, "Факултетен номер - задължително поле !"); }
  if (empty($name)) { array_push($errors, "Име - задължително поле !"); }
  if (empty($lname)) { array_push($errors, "Фамилия- задължително поле !"); }
  if (empty($email)) { array_push($errors, "Имейл - задължително поле !"); }
  if (empty($password_1)) { array_push($errors, "Парола - задължително поле !"); }
  if (empty($specialty)) { array_push($errors, "Специалност - задължително поле !"); }
  if (empty($course)) { array_push($errors, "Курс - задължително поле !"); }
  if (empty($education)) { array_push($errors, "Форма на обучение - задължително поле !"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Двете пароли не съвпадат !");
  }
 

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM myusers WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Потребителското име е заето !");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Имейла е зает !");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO myusers (username, fnumber , name , sname , lname , email , password , specialty , course , education) 
  			  VALUES('$username', '$fnumber', '$name' ,  '$sname', '$lname' , '$email' , '$password' , '$specialty' ,'$course' , '$education')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Влезнали сте в системата !";
  	header('location: index.php');
  }
}

// ... 
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Потребителско име - задължително поле !");
  }
  if (empty($password)) {
  	array_push($errors, "Парола - задължително поле !");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM myusers WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Влезнали сте в системата !";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Грешно потребителско име/парола комбинация");
  	}
  }
}

?>