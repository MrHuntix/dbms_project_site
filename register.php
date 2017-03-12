<?php
	require 'dbase.php';
	include 'login.php';
	$err="fill in all the fields";
	$succ=" ";
	if(isset($_SESSION['username'])&&!empty($_SESSION['username']))
	{
		header("Location:afterlog.php");
	}
	if(isset($_POST['f_name'])&&isset($_POST['l_name'])&&isset($_POST['address'])&&isset($_POST['pno'])&&isset($_POST['dob'])&&isset($_POST['u_name'])&&isset($_POST['p_name'])){
		$f_name=$_POST['f_name'];
		$l_name=$_POST['l_name'];
		$address=$_POST['address'];
		$pno=$_POST['pno'];
		$dob=$_POST['dob'];
		$u_name=$_POST['u_name'];
		$p_name=$_POST['p_name'];
		if(!empty($f_name)&&!empty($l_name)&&!empty($address)&&!empty($pno)&&!empty($dob)&&!empty($u_name)&&!empty($p_name)){
			$queryc="SELECT username FROM customer WHERE username='$u_name'";
			$run=mysql_query($queryc);
			if(mysql_num_rows($run)==1)
			{
				$err="username already exists";
			}
			else{
				$ins_q="INSERT INTO customer VALUES('','$f_name','$l_name','$address','$pno','$dob','$u_name','$p_name')";
				if(mysql_query($ins_q)){
					$succ="you have been registered successfully";
					$err=" ";
				}
			}
		}
		else{
			$err="fill in all the fields";
		}
	}
	else{
		$err="fill in all the fields";
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
			<center><h3 class="bg-info">REGISTER</h3>	
		<div id="frm">
			<form action="register.php" method="POST" class="form-horizontal" >
		        <input class="form-control" type="text" placeholder="enter firstname" name="f_name"><br>	   
		        <input class="form-control" type="text" placeholder="enter lastname" name="l_name"><br>
		        <input class="form-control" type="text" placeholder="enter address" name="address"><br>
		        <input class="form-control" type="text" placeholder="enter phone number" name="pno"><br>
		        <input class="form-control" type="text" placeholder="enter date of birth" name="dob"><br>
		        <input class="form-control" type="text" placeholder="enter username" name="u_name"><br>
		        <input class="form-control" type="password" placeholder="enter password" name="p_name"><br/><br>
		        <input type="submit" value="login" name="login" class="btn btn-default"> &nbsp;
		    </form></div></center>
		<p><?php echo $err; ?></p>
		<p><?php echo $succ; ?></p>
		<p>New, click <a href="index.php">here</a> to login.</p>
	</body>