<?php
	include("config.php");
	$shop = $_GET["shop"];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title> ATN Shop Page </title>
</head>
<h1> PAGE FOR SHOP A <h1/>
	</head>
	<body>
		<form action-"" method-"post>
	<input type="submit" name="deleteButton"
			value="Input sell data"/> <br/><br/>
			
	<input type="submit" name="updateButton"
			value="Input update data"/>
	</form>
	<?php
	
		if(isset($_POST['deleteButton']))
		{
			header("Location: delete1.php?shop=$shop");
		}
		if(isset($_POST['updateButton']))
		{
			header("Location: update1.php?shop=$shop");
		}
	?>
		<p> Data for Shop A <p/>
	<?php
	session_start();
		function exceptions_error_handler($severity, $message, $filename, $lineno) 
		{
			throw new ErrorException($message, 0, $severity, $filename, $lineno);
		}

		set_error_handler('exceptions_error_handler');
		$input = "Shop_A";
		$table_name = "product";
		include("config.php");
		include("db_display.php");
		//check if form was submitted
		if(isset($_POST['submitButton'])) 
		{ 
			//get input text
			$input = $_POST['db_selection'];
		}
		# Try to display SQL table
		try 
		{
			echo "<p> DATABASE FROM ".$input."</p>"; 
			
			$pg_heroku = pg_connect($conn_string);
											
			if ($input == "Shop_A")
			{
				# Get data by query
				$result = pg_query($pg_heroku, "select * from ".$table_name." where shop_name='$input'");
			}
			display_table($result);
			pg_close();
		}
		catch (Exception $e) 
		{
			#echo 'Caught exception: ',  $e->getMessage(), "\n";
			echo "Caught exception: <br/>", $e->getMessage(), "\n";
		}
	?>
	</body>
</html>
