<?php
/**
 * Created by PhpStorm.
 * User: Pranav
 * Date: 14-06-2015
 * Time: 16:54
 */
require "db/db.php";
$functional_area=$_POST['txt_functional_area_name'];
$program_name = $_POST['program_name'];
$program_release = $_POST['program_release'];
$program_number = $_POST['program_number'];

$sql2 = "select program_id from program where program_name = '".$program_name."' and program_number=".$program_release." and program_release=".$program_number;
$result2 = db($sql2);
while ($row = $result2->fetch_assoc()) {
    $program_id = $row['program_id'];
}
$sql1 = "SELECT * FROM Functional_area WHERE func_name='".$functional_area."'";
$query = rowcount($sql1);


if ($query>0)
{
    echo "Functional area already exists.";
    echo "<BR>";
    echo "<a href='add_functional_area.php'>Back to main page</a>";

}else
{

    $sql = 'Insert into Functional_area (func_name, program_id) Values ("' . $functional_area . '",'.$program_id.')';
    $result = insertdb($sql);
    if ($result) {
        echo "<br/>Your details have been updated";
        echo "<BR>";
        echo "<a href='home_manage_database.php'>Back to main page</a>";
    } else {
        echo "<br/>There was some error in adding.";
        echo "<BR>";
        echo "<a href='add_functional_area.php'>Back to main page</a>";
    }
}

//else {
//    echo "ERROR";
//}
?>