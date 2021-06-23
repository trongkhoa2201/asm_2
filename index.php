<?php
	include("config.php");
	#ob_start();
	session_start();
	$error = "";
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		// username and password sent from form 
		$login_user = $_POST['username'];
		$login_pwd = $_POST['password']; 
		# Create connection to Heroku Postgres
		$pg_heroku = pg_connect($conn_string);
		# Get data by query
		$sql = "SELECT * FROM account WHERE username = '$login_user' and password = '$login_pwd'";
		$result = pg_query($pg_heroku,$sql);
		
		$num_rows = pg_num_rows($result);

		// If result matched $login_user and $login_pwd, table row must be 1 row
		if($num_rows == 1) 
		{
			$row = pg_fetch_array($result, 0);
			$_SESSION["name"] =  $row['username'];
			$_SESSION["shop"] =  $row['shop_name'];
			$users = $row['username'];
			$pass = $row['password'];
		}
        else 
		{
			$error = "Your Login Name or Password is invalid";
		}	
			if ($users == "boss")
			{
				header("location: db_crud.php");
			}
			if ($users == "user1")
			{
				header("location: db_selection.php");
			}
			if ($users == "user2") 
			{
				header("location: db_prob.php");
			}
			pg_close();	
    }
?>

<html> 

   <head>
	
      <title>ATN Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
			box-sizing: border-box;
			font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
			font-size: 16px;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
         }
		 h1 
		{
		  color: #666;
		  margin: 20px 10px 0px;
		  padding: 0px 30px 0px 30px;
		  text-align: center;
		}
		
      </style>
      
   </head>
   <h1> Welcome to ATN 	<h1/>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = "Submit"/><br />
				</form>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
