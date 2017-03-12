<?php
	require 'session.php';
	require 'dbase.php';
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
	$today=strtotime(date('Y/m/d'));
	$q2="SELECT CustomerID FROM customer WHERE username='$user_check'";
	$query_run2=mysql_query($q2);
	$res2=mysql_fetch_assoc($query_run2);
	$c_id=$res2['CustomerID'];
	$rented_query="SELECT Title,Date_Due,RentalID FROM movie,rental WHERE movie.MovieID=rental.MovieID AND rental.CustomerID=$c_id";
			$rent_run=mysql_query($rented_query);
			while($row=mysql_fetch_assoc($rent_run)){
				$due_time=strtotime($row['Date_Due']);
				if($today>$due_time){
					$rent_id=$row['RentalID'];
					$del_query="DELETE FROM rental WHERE RentalID='$rent_id'";
					mysql_query($del_query);
				}
			}
?>