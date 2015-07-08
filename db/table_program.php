<?php
require "db.php";

$sql = "SELECT * FROM program";
$result = db($sql);
$table = null;
if ($result->num_rows > 0) {
	$table .= "Program Name &nbsp;&nbsp;&nbsp;&nbsp; Number &nbsp;&nbsp;&nbsp;&nbsp; Release";
	while ($row = $result->fetch_assoc()) {
		$table .= "&nbsp;".$row['program_name'];
		$table .= "&nbsp;&nbsp;&nbsp;&nbsp;".$row['program_number'];
		$table .= "&nbsp;&nbsp;&nbsp;&nbsp;".$row['program_release'];
		}
	echo $table;

}
?>