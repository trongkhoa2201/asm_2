<?php
	include("config.php");
	$shop = $_GET["shop"];
?>
<html>
<head>
<script type = "text/JavaScript">
	 <!--
		function AutoRefresh( t ) {
		   setTimeout("location.reload(true);", t);
		}
	 //-->
	</script>
    <form action="" method="post">
         <select name = "time_selection">
            <option value = 5 >5 second</option>
            <option value = 10>10 second</option>
            <option value = 30 selected>30 second</option>
         </select><br/>
		<input type="submit" name="timerButton" value="Set time"/>
    </form> 
	<?php
		$sec = 5;
		if(isset($_POST['timerButton'])) 
			{ 
				//get input text
				$sec = $_POST['time_selection'];
				
			}
		echo "This page will reload itself in $sec second!";
	?>  
<meta charset="UTF-8">
<title> ATN Shop Page </title>
</head>
<h1> Data for DIRECTOR <h1/>
<body> onload = "JavaScript:AutoRefresh(<?php echo $sec*1000; ?>);">
	<<p> Select a shop's database <p/>
	<form 
	<form action="" method="post">
         <select name = "db_selection">
            <option value = "SHOP_A" >Shop A</option>
            <option value = "SHOP_B">Shop B</option>
            <option value = "ALL" selected>All shops</option>
			</select><br/>
		<input type="submit" name="submitButton" value="Submit"/>
    </form>
	<?php
	session_start();
		function exceptions_error_handler($severity, $message, $filename, $lineno) 
		{
			throw new ErrorException($message, 0, $severity, $filename, $lineno);
		}

		set_error_handler('exceptions_error_handler');
		$input = "ALL";
		$table_name = "product";
		include("local_config.php");
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
											
			if ($input == "ALL")
			{
				# Get data by query
				$result = pg_query($pg_heroku, "select * from ".$table_name);
			}
			else 
			{
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
	<br/>
	<?php
		
	if($_SESSION["name"]) {
	?>
	Click here to <a href="logout.php" tite="Logout">Logout.
	<?php
	}else echo "<h1>Please login first .</h1>";
	?>
</body>
</html>
