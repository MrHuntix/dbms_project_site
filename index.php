<?php
	include 'login.php';
	$err=" ";
	if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
	{
		header("Location:afterlog.php");
	}
	else{
		$err=$GLOBALS['error'];
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8"> 
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>HOME</title>
		<script type="text/javascript" src="js/scripts.js">
		</script>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
			<center><h3 class="bg-info">MOVIE RENTAL	</h3>	
		<div id="frm">
			<form action="index.php" method="POST" class="form-horizontal" >
		        <label class="control-label">Username:</label>
		        <input class="form-control" type="text" placeholder="Username" name="u_name"><br/><br>
		        <label class="control-label">Password:</label>
		        <input class="form-control" type="password" placeholder="Password" name="p_word"><br/><br>
		        <input type="submit" value="login" name="login" class="btn btn-default"> &nbsp;
		    </form></div></center>
		<p><?php echo $err; ?></p>
		<p>New, click <a href="register.php">here</a> to become a member.</p>
	</body>