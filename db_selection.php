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
	include("fetch_a.php");
	$pg_conn = pg_connect($conn_string);
	$table = "producta";
	pg_close();
	?>
	</body>
</html>
