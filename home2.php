<?php 
session_start();

if (!isset($_SESSION['user_name']) || isset($_SESSION['user_name']) !==true) {
    header("Location: login.php");

}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <h1>Your medicine will be delivered on your address</h1>
     <h1>Please make sure you have completed the payment.</h1>
    <br>
    <button id="myBtn">Confirm Payment</button>

     <a style="margin: 5px;" href="logout.php">Logout</a>


     <script>
        var btn = document.getElementById('myBtn');
            btn.addEventListener('click', function() {
            document.location.href = 'payment.php';
        });
     </script>
</body>
</html>

