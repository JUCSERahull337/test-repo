<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	//$uaddress = validate($_POST['uaddress']);
	//print "<h2?" .$pass.$data."</h2>";

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required".$pass);
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        //$pass = md5($pass);

        
		$sql = "SELECT * FROM register WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			print "<h2>" .$row."</h2>";
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home2.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password".$uname);
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password".$pass);
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}