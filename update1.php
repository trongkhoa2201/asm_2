<?php
                        $host_heroku = "ec2-54-91-188-254.compute-1.amazonaws.com";
			$db_heroku = "d3avp12ob9g5o8";
			$user_heroku = "vgvukkjgszbaba";
			$pw_heroku = "6c4e536add531cd9f19cf9056e038d4919f1cd1eab35d78862f9d22525e61ee9";
			# Create connection to Heroku Postgres
			$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
			# Connect to DATABASE
			$pg_conn = pg_connect($conn_string);
			$result = pg_query($pg_conn, "select * from product;");
			#var_dump(pg_fetch_all($result));
			
			$numrows = pg_num_rows($result)
	$result = pg_Exec($conn,"SELECT * FROM product WHERE product_id, product_name, price, amount='$shop'");
	if (!$result) {echo "A query error occurred.\n"; exit;}
	$product_id = pg_Result($result, $shop, "product_id");
	$product_name = pg_Result($result, $shop, "product_name");
	$price = pg_Result($result, $shop, "price");
	$amount = pg_Result($result, $shop, "amount");
	pg_FreeResult($result);
	pg_Close($conn);
if (!$pg_conn)
{
die('Error: Could not connect: ' . pg_last_error());
}

?>
<html>
<body>
  <b>Please update the following:</b></font>
  <p><font size="2" face="Arial, Helvetica, sans-serif">
  <form action="edit.php?ID=<? echo $CID ?>" method="POST" enablecab="Yes">
  product_id:<br>
  <input type="Text" name="product_id" align="LEFT" required="Yes" size="59" 
  value="<? echo $CName ?>"><br>
  product_name:<br>
  <input type="Text" name="product_name" align="LEFT" required="Yes" size="59"
  value="<? echo $CAddress ?>"><br>
  price:<br>
  <input type="Text" name="price" align="LEFT" required="Yes" size="29"
  value="<? echo $CCity ?>"><br>
  amount:<br>
  <input type="Text" name="amount" align="LEFT" required="Yes" size="2"
  value="<? echo $CState ?>"><br>
  </form>
</body>
</html>

