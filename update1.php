<?php
                        $host_heroku = "ec2-54-91-188-254.compute-1.amazonaws.com";
			$db_heroku = "d3avp12ob9g5o8";
			$user_heroku = "vgvukkjgszbaba";
			$pw_heroku = "6c4e536add531cd9f19cf9056e038d4919f1cd1eab35d78862f9d22525e61ee9";
			# Create connection to Heroku Postgres
			$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
			# Connect to DATABASE
			$pg_conn = pg_connect($conn_string);

if (!$pg_conn)
{
die('Error: Could not connect: ' . pg_last_error());
}
$pi=$_GET['pi'];
$pn=$_GET['pn'];
$pp=$_GET['pp'];
$stt=$_GET['stt'];
?>
<html>
 <head>
 <title> Update </title>
 </head>
 <body>
 <br>
 <form action="" method="GET">
 <table border"0" bgcolor="white" align="center" cellspacing="20">

 <tr>
 <td>Product ID</td>
 <td><input type="text" value="<?php echo "$pi" ?>" name="productid" required></td>
 </tr>

 <tr>
 <td>Product Name</td>
 <td><input type="text" value="<?php echo "$pn" ?>" name="productname" required></td>
 </tr>

 <tr>
 <td>Product Price</td>
 <td><input type="text" value="<?php echo "$pp" ?>" name="productprice" required></td>
 </tr>

 <tr>
 <td>Status</td>
 <td><input type="text" value="<?php echo "$stt" ?>" name="status" required></td>
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
$productid = $_GET['productid'];
$productname = $_GET['productname'];
$productprice = $_GET['productprice'];
$status = $_GET['status'];
$query = "UPDATE shop1 SET productid='$productid', productname='$productname', productprice='$productprice', status='$status' WHERE productid='$productid' ";
$data = pg_query($pg_conn,$query);
if($data)
{
echo "<script>alert('Updated Successfully!')</script>";
?>
<meta http-equiv="refresh" content="0; url=https://fptapptech.herokuapp.com/shop1.php">
<?php
}
else
{
echo "Failed to update the table.";
}
}
?>