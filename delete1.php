<title>DELETE DATABASE</title>
<?php
$host_heroku = "ec2-54-91-188-254.compute-1.amazonaws.com";
			$db_heroku = "d3avp12ob9g5o8";
			$user_heroku = "vgvukkjgszbaba";
			$pw_heroku = "6c4e536add531cd9f19cf9056e038d4919f1cd1eab35d78862f9d22525e61ee9";
			# Create connection to Heroku Postgres
			$conn_string = "host=$host_heroku port=5432 dbname=$db_heroku user=$user_heroku password=$pw_heroku";
			# Connect to DATABASE
			$pg_conn = pg_connect($conn_string);

if (!$conn) {echo "An database connection error occurred.\n"; exit;}
$result = pg_Exec($conn,"DELETE FROM product WHERE shop_name=product");
 if (!$result) {echo "A DELETE query error occurred.\n"; exit;}
pg_FreeResult($result);
pg_Close($conn);
</head>
<body>
<b>The record was deleted</b><br><br>
<a href=db_selection.php>Back to Select Page</a>
</body>
</html>
