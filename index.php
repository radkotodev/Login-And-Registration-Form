<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
	<title>Начална страница</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<?php include('8.3.php') ?>
	</head>

<body>

<div class="header">
	<h2>Начална страница</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Добре дошли ! <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">Излез</a> </p>
    <?php endif ?>
	<div class="link">
  		  <a href="kursova.php" style="color:red">Нова курсова работа</a>
  	</div>
</div>
		
		<table>
<tr>
<th>courseworkID</th>
<th>Name</th>
<th>Date</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "myregistration");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT courseworkID, name, date ,studentID  FROM coureworks";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["courseworkID"]. "</td><td>" . $row["name"] ."</td><td>"
. $row["date"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
  

		
</body>
</html>