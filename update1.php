<html>
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
			
if (!$pg_conn)
{
die('Error: Could not connect: ' . pg_last_error());
}
$product_id=$_GET['product_id'];
$product_name=$_GET['n'];
$price=$_GET['price'];
$amount=$_GET['amount'];
?>
 <head>
 <title> Update </title>
 </head>
 <body>

 <br>
 <form action="" method="GET">


 <tr>
 <td>Product ID</td>
 <td><input type="text" value="<?php echo "$product_id" ?>" name="product_id" required></td>
 </tr>

 <tr>
 <td>Product Name</td>
 <td><input type="text" value="<?php echo "$product_name" ?>" name="product_name" required></td>
 </tr>

 <tr>
 <td>Product Price</td>
 <td><input type="text" value="<?php echo "$price" ?>" name="price" required></td>
 </tr>

 <tr>
 <td>Amount</td>
 <td><input type="text" value="<?php echo "$amount" ?>" name="amount" required></td>
 </tr>

 <tr>
 <td colspan="2" align="center"><input type="submit" id="button" name="submit" value="Update"></td>
 </tr>
 </form>
 </table>
</body>
</html>
<?php
if($_GET['submit'])
{
$productid = $_GET['product_id'];
$productname = $_GET['product_name'];
$productprice = $_GET['price'];
$status = $_GET['amount'];
  $query = "UPDATE shop1 SET productid='$product_id', productname='$product_name', productprice='$price', status='$amount' WHERE productid='$product_id' ";
$data = pg_query($pg_conn,$query);
if($data)
{
echo "<script>alert('Updated Successfully!')</script>";
?>
<meta http-equiv="refresh" content="0; url=https://cloudasm-2.herokuapp.com/db_selection.php">
<?php
}
else
{
echo "Failed to update the table.";
}
}
?>

