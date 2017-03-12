<?php
	require 'dbase.php';
	$error='';
	session_start();
	if(isset($_POST['u_name'])&&isset($_POST['p_word']))
	{
		$username=$_POST['u_name'];
		//$SESSION
		$password=$_POST['p_word'];
		if(!empty($username)&&!empty($password))
		{
			$query="SELECT CustomerID FROM customer WHERE username='".mysql_real_escape_string($username)."' AND password='".mysql_real_escape_string($password)."'";
			$q=mysql_query($query);
			$res1=mysql_fetch_assoc($q);
			$c_id=$res1['CustomerID'];
			$_SESSION['cust_id']=$c_id;
			if($query_run=mysql_query($query))
			{
				if($row=mysql_num_rows($query_run)==0)
				{
					$GLOBALS['error']="username/password incorrect";
				}
				else
				{
					$_SESSION['username']=$username;
					$_SESSION['ids']=$row1['CustomerID'];
					header("Location:afterlog.php");
				}
			}
		}
		else
		{
			$GLOBALS['error']="username/password not entered";
		}
	}

?>