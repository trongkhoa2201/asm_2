 <?php
# argument: query results
	function display_table($query_obj)
	{
		$num_rows = pg_num_rows($query_obj);
		$num_fields = pg_num_fields($query_obj);
		# Init a table
		echo ' <table border="1">
			   <tr>';
	    $field_list = array();
		# Diplay header
		for ($i=0; $i<$num_fields; $i++)
		{
			$field_name = pg_field_name($query_obj, $i);
			$field_list[$i] = $field_name;
			echo "<th> $field_name </th>";
		}
		echo "</tr>";
		# diplay a row function
		function display_row($row, $fieldlist)
		{
			echo "<tr>\n";
			foreach ($fieldlist as $fieldname)
			{
				echo "<td>", $row[$fieldname], "</td>";
			}
			echo "</tr>";			
		}
		# display all rows
		for ($row_index=0; $row_index<$num_rows; $row_index++)
		{
			$row = pg_fetch_array($query_obj, $row_index);
			# display a row
			display_row($row, $field_list);
		}
		echo "</table>";
	}
?>
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
