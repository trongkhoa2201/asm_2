<?php
	include("config.php");
	$shop = $_GET["shop"];
?>
<html>
<head>
<meta charset="UTF-8">
<title> ATN Shop Page </title>
</head>
<h1> PAGE FOR SHOP <h1/>

<body>
	<p> Data for DIRECTOR <p/>
	<?php
	include("local_fetch.php");
	$pg_heroku = pg_connect($conn_string);
	$table = "product";	
	pg_close();
	?>
</body>
</html>