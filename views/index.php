
<?php 
include('/xampp/htdocs/tratt0s4/code/connection.php');
$username = $_POST['username'];  
$password = $_POST['password'];  
if(isset($mysqli,$_POST['submit'])){
    $username = mysqli_real_escape_string($mysqli,$_POST['username']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $password=md5($password);
    $query1=mysqli_query($mysqli,"SELECT username,password FROM usuarios
	 WHERE username='$username' AND password='$password'");
	$row=mysqli_fetch_array($query1);
	{
		$db_username=$row["username"];
		$db_password=$row["password"];
		if($username==$db_username && $password==$db_password){
			session_start();
			$_SESSION["username"]=$db_username;
			
			if($_SESSION["type"]=='username'){
               
				header("Location:inicio.php");
			}
		}
		else{
			?>
	<script type="text/javascript">
	alert("Usuario o Contraseña incorrecta, verifica tus datos.");
	window.location.href='index.php';
	</script>';
<?php
		}
	
    }
}

?>
<html>
    <style>
* {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  	font-size: 16px;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
body {
  	background-color: #2d662f;
}
.login {
  	width: 400px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
  	margin: 100px auto;
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 24px;
  	padding: 20px 0 20px 0;
  	border-bottom: 1px solid #dee0e4;
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 20px;
}
.login form label {
  	display: flex;
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	background-color: #4caf50;
  	color: #ffffff;
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #dee0e4;
  	margin-bottom: 20px;
  	padding: 0 15px;
}
.login form input[type="submit"] {
  	width: 100%;
  	padding: 15px;
 	margin-top: 20px;
  	background-color: #4caf50;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #4caf50;
  	transition: background-color 0.2s;
}

    </style>
       <head>
           <meta charset="utf-8">
           <title>NAFTA</title>
           <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
       </head>
       <body>
           <div class="login">
               <h1>NAFTA</h1>
               <form action="index.php" method="post">
                   <label for="username">
                       <i class="fas fa-user"></i>
                   </label>
                   <input type="text" name="username" placeholder="Username" id="username" required>
                   <label for="password">
                       <i class="fas fa-lock"></i>
                   </label>
                   <input type="password" name="password" placeholder="Password" id="password" required>
                   <input type="submit" value="Login">
               </form>
           </div>
       </body>

</html>