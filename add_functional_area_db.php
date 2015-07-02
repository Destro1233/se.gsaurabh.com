<?php
/**
 * Created by PhpStorm.
 * User: Pranav
 * Date: 14-06-2015
 * Time: 16:54
 */
require "db/db.php";
$functional_area=$_POST['txt_functional_area_name'];

$sql = 'Insert into Functional_area (func_name) Values ("'.$functional_area.'")';
$result = insertdb($sql);
if($result){
    echo"<br/>Your details have been updated";
    echo "<BR>";
    echo "<a href='home.php'>Back to main page</a>";
}else{
    echo"<br/>There was some error in adding.";
    echo "<BR>";
    echo "<a href='home.php'>Back to main page</a>";
}

//else {
//    echo "ERROR";
//}
?>