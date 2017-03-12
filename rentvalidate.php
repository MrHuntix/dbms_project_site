<?php
	require 'session.php';
	//echo "You selected ".$movie_name." due date ".date("Y-m-d",strtotime($date));
	if(isset($_POST['mname'])&&isset($_POST['date'])){
		$movie_name=$_POST['mname'];
		$date=$_POST['date'];
		$cur_d=date('Y/m/d');
		//echo "qw";
		if(!empty($movie_name)&&!empty($date)){
			//echo "qw1";
			$q1="SELECT MovieID,CompanyID FROM movie WHERE Title='$movie_name'";
			$q2="SELECT CustomerID FROM customer WHERE username='$user_check'";
			$query_run1=mysql_query($q1);
			$query_run2=mysql_query($q2);
			$res1=mysql_fetch_assoc($query_run1);
			$res2=mysql_fetch_assoc($query_run2);//echo "qw11";
			$m_id=$res1['MovieID'];
			$c_id=$res2['CustomerID'];//echo "qw1qq";
			$ins_que="INSERT INTO rental VALUES ('','$c_id','$m_id','$cur_d','$date')";//echo "qw1af";

			if(mysql_query($ins_que)){
				echo "You have rented ".$movie_name;
				echo "<br/><a href='index.php'>Click </a> to go back";
			}
		}
		else{
			echo "Please select the movie/due-date.";
		}
	}
	else
	{
		echo "Please select the movie/due-date.";
		//header('Location:index.php');
	}
?>