<title>DELETE DATABASE</title>
<?php
    $host_heroku = "ec2-54-91-188-254.compute-1.amazonaws.com";
	$db_heroku = "d3avp12ob9g5o8";
	$user_heroku = "vgvukkjgszbaba";
	$pw_heroku = "6c4e536add531cd9f19cf9056e038d4919f1cd1eab35d78862f9d22525e61ee9";
	# Create connection to Heroku Postgres
	$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
	# Connect to DATABASE
	$pg_heroku = pg_connect($conn_string);	
	if (!$pg_heroku)
	{
		die('Error: Could not connect: ' . pg_last_error());
	}
	if(isset ($_POST ['submit'] ))
	{
		
		$product_id=$_POST['product_id'];
		$product_name=$_POST['product_name'];
		$price=$_POST['price'];
		$amount=$_POST['amount'];
		$result = pg_query($pg_heroku, "DELETE FROM product WHERE product_id='$product_id'; "); 
		if($result)
			{
			echo "<script>alert('DELETE Successfully!')</script>";
			?>
			<meta http-equiv="refresh" content="0; url=https://cloudasm-2.herokuapp.com/db_selection.php">
			<?php
			}
			else
			{
			echo "Failed to delete the table.";
			}
			}
	
	pg_close();
?>
<html>
<head>
	<title> DELETE </title>
</head>
<body>
	<br>
	<form method="POST" >
	<tr>
	<td>Product ID</td>
	<td><input type="text" name="product_id" required></td>
	</tr>
	<tr>
	<td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Delete"></td>
	</tr>
	</form>
</body>
</html>
