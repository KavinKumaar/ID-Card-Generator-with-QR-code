<?php
    require_once "db.php";
    if(isset($_GET['Id'])) {
        $sql = "SELECT ImageData,ImageType FROM student WHERE Id=" . $_GET['Id'];
		$result = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($con));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["ImageType"]);
        echo $row["ImageData"];
	}
	mysqli_close($con);
?>