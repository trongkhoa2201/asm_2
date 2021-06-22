	<body>
		<?php 
		

			# DATABASE credential
			$host_heroku = "ec2-54-91-188-254.compute-1.amazonaws.com";
			$db_heroku = "d3avp12ob9g5o8";
			$user_heroku = "vgvukkjgszbaba";
			$pw_heroku = "6c4e536add531cd9f19cf9056e038d4919f1cd1eab35d78862f9d22525e61ee9";
			# Create connection to Heroku Postgres
			$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
			# Connect to DATABASE
			$pg_conn = pg_connect($conn_string);
			# Get data by query
			$result = pg_query($pg_conn, "select * from productb;");
			#var_dump(pg_fetch_all($result));
			
			$numrows = pg_num_rows($result)
		?>

		<table border="1">
		<tr>
		<th>product_id</th>
		<th>product_name</th>
		<th>product_price</th>
		</tr>
		<?php
			// Loop on rows in the result set
			for($row_index = 0; $row_index < $numrows; $row_index++) 
			{
				echo "<tr>\n";
				$row = pg_fetch_array($result, $row_index);
				echo " <td>", $row["product_id"], "</td><td>", 
							  $row["product_name"], "</td><td>", 
							  $row["price"], "</td></tr>";
			}
			pg_close();
		?>
		
		</table>

	</body>
