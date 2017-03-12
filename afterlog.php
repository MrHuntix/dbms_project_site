<?php
	require 'session.php';
	require 'dbase.php';
	include 'remove.php';
	$list=[];
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
	<script type="text/javascript" src="main.js"></script>
</head>
<body>
<nav id="nav" class="navbar navbar-inverse navbar-fixed-top"  >
  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="#"><?php echo "Welcome ".$user_check; ?></a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a style="color:white;" href="index.php">HOME</a></li>
	        <li><a style="color:white;" href="#movielist">MOVIES</a></li>
	        <li><a style="color:white;" href="#rent">RENT</a></li>
	        <li><a style="color:white;" href="#topselling">TOP RENTED</a></li>
	        <li><a style="color:white;" href="#rented">RENTED</a></li>
	        <li><a style="color:white;" href="logout.php">LOGOUT</a></li>
	      </ul>
	    </div>
  </div>
</nav>
<div class="container text-center" style="background-color:#9ad3de;width:100%;padding-top:80px;">
	<a name="movielist"></a>
	  <b><h2 class="text-danger" >MOVIES IN STOCK</h3></b>
	  <p class="lead"><?php
	  	$query="SELECT MovieID,Title,Genere,CompanyName FROM movie,producer WHERE movie.CompanyID=producer.CompanyID ORDER BY MovieID";
	  	$qr=mysql_query($query);
	  	while($row=mysql_fetch_assoc($qr))
	  {
	  	echo $row['MovieID']."> Movie Name:".$row['Title']." || ";
	  	echo "Genere:".$row['Genere']." || ";
	  	echo "Production House:".$row['CompanyName']."<br>";
	  	array_push($list, $row['Title']);
	  }
	  ?>
	  </p>
</div>
<div class="container text-center" style="background-color:	#FF6347;width:100%;">
	<a name="rent"></a>
	<form action="rentvalidate.php" method="POST" style="margin-top:20px;margin-bottom:20px;">
		<label>Enter the name of the movie you want to rent:</label><br>
		<input list="movies" name="mname" placeholder="Select a movie">
		<datalist id="movies">
			<?php
				foreach ($list as $name) {?>
				<option value="<?php echo $name; ?>">
				<?php	
				}
			?>
		</datalist><br>
		<label>Enter the the date you will return the movie:</label><br>
		<input type="date" name="date" value="">
		<input type="submit" name="submit">
	</form>	  
	<?php echo $GLOBALS['movie_error'];?>
</div>
<div class="container text-center" style="background-color:#c9d8c5;width:100%;">
	<a name="topselling"></a>
	<h2 class="text-center">TOP RENTED</h2>
	<p class="lead"><?php
		$q_rent="SELECT rental.MovieID,COUNT(rental.MovieID),Genere,Duration AS movie_count,Title FROM rental,movie WHERE movie.MovieID=rental.MovieID GROUP by rental.MovieID ORDER BY COUNT(rental.MovieID) DESC LIMIT 3";
		$rent_run=mysql_query($q_rent);
		$i=1;
		while($rent_row=mysql_fetch_assoc($rent_run))
	  {
	  	echo $i."> Movie Name:".$rent_row['Title']."||"."Genere: ".$rent_row['Genere']."||Title: ".$rent_row['movie_count']." min<br>";
	  	$i++;
	  }
	?></p>
</div>
<div class="container text-center" style="background-color:#004687;width:100%;">
	<a name="rented"></a>
	<h2 class="text-center" style="color:white;">Your rented list</h2>
	<p style="color:white;font-size: 150%;">
		<?php
			$q2="SELECT CustomerID FROM customer WHERE username='$user_check'";
			$query_run2=mysql_query($q2);
			$res2=mysql_fetch_assoc($query_run2);
			$c_id=$res2['CustomerID'];
			$rented_query="SELECT Title FROM movie,rental WHERE movie.MovieID=rental.MovieID AND rental.CustomerID=$c_id";
			$rent_run=mysql_query($rented_query);
			while($row=mysql_fetch_assoc($rent_run)){
				echo "Movie name: ".$row['Title']."<br>";
			}

		?>
	</p>
</div>
</body>
</html>

