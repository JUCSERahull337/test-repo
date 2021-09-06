<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['hname']) && isset($_POST['accNo'])
    && isset($_POST['medName']) && isset($_POST['medNo'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$hname = validate($_POST['hname']);
	$accNo = validate($_POST['accNo']);
	$medName = validate($_POST['medName']);
	$medNo = validate($_POST['medNo']);

	$user_data = 'hname='. $hname. '&medName='. $medName. '&accNo='. $accNo. '&medNo='. $medNo;


	if (empty($hname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($accNo)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($medName)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($medNo)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else{

		// hashing the password
        //$pass = md5($pass);
		//print "<h2?" .$pass."</h2>";

	    $sql = "SELECT * FROM payment WHERE holder_name='$hname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO payment(holder_name, account_no, medicine_name,medicine_no) VALUES('$hname', '$accNo', '$medName','$medNo')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully".$pass);
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}