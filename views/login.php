<?php      
    $username = $_POST['username'];  
    $password = $_POST['password'];  
    $con = mysqli_connect("localhost", "root", "", "trattosa") 
    or die(mysqli_connect_errno($mysqli));
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select *from usuarios where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            header("Location: inicio.php?error=Incorect User name or password");
        }  
        else{  
            header("Location: index.html?error=Incorect User name or password");
        }     
?>  