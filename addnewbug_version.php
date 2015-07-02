<?php
/**
 * Created by PhpStorm.
 * User: Saurabh
 * Date: 6/15/2015
 * Time: 10:32 PM
 */
require "db/db.php";
echo "<select class='version_select' id='program_number'><option></option>";
$program_name = $_GET['program_name'];
$sql1 = 'SELECT DISTINCT program_number FROM program WHERE program_name="'. $program_name .'"';
$result1 = db($sql1);
while ($row1 = $result1->fetch_assoc()) {
    $program_version = $row1['program_number'];
    echo '<option name ="' . $program_version . '">' . $program_version . '</option>';
}
echo "</select>";
?>