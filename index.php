<html lang="en">
<head>
</head>
<body>
<?php
$d=date("D");
/*
if ($d=="Fri")
	echo "Have a nice weekend";
else
	echo"have a nice day";
*/
switch($d)
{
	
	case "Mon":
	    $d == "Mon";
		echo "hello class, a happy week";
	break;
	case "Wed":
	    $d == "Wed";
		echo"Goodbye class. A happy weekend";
	break;
default:
echo "No class today";
	
}
?>
</body>
</html)
