<?php
/**
 * Created by PhpStorm.
 * User: Saurabh
 * Date: 6/15/2015
 * Time: 10:32 PM
 */
require "db/db.php";
echo "<select class='release_select' id='release1'><option></option>";
$programname = $_GET['program_name'];
$sql1 = 'SELECT DISTINCT program_release FROM program WHERE program_name="'. $programname .'"';
$result1 = db($sql1);
while ($row1 = $result1->fetch_assoc()) {
    $program_release = $row1['program_release'];
    echo '<option name ="' . $program_release . '">' . $program_release . '</option>';
}
echo "</select>";
?>