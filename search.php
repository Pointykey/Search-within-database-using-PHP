<?php

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "search");

$result = "";

if (isset($_POST["sub"]))
	{
		$search = $_POST["text"];

		$sql = "SELECT * FROM wizard WHERE FirstName LIKE '%$search%' OR LastName LIKE '%$search%'";
		$query = mysqli_query($con, $sql);

		$rows = mysqli_num_rows($query);

		if ($rows == 0)
		{
			$result = "Here is no result about the search";
			print($result);
		}

		else 
		{
			while ($info = mysqli_fetch_array($query))
			{
				$fstN = $info["FirstName"];
				$lstN = $info["LastName"];
		

				$result = "" .$fstN. " " .$lstN. "<br>" . "";
				print($result);


			}
		}




	}

?>

<!doctype html>
<html lang="en-IN">
<head>

	<title>Search</title>

</head>

<body>

<form action="search.php"method="POST">

	<input type="text"placeholder="Search here..."name="text">
	<input type="submit"name="sub"value="Submit">
</form>


</body>
</html>
