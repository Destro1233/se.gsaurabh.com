<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-06-2015
 * Time: 20:35
 */
require "db/db.php";
$functional_area=$_POST['txt_functional_area_name'];
$functional_name=$_POST['dd_functional_area'];

$sql = 'UPDATE Functional_area SET func_name = "'.$functional_area.'" WHERE func_name = "'.$functional_name.'"' ;
$result = insertdb($sql);
if($result){
    echo"<br/>Your details have been updated";
    echo "<BR>";
    echo "<a href='home_manage_database.php'>Back to main page</a>";
}else{
    echo"<br/>There was some error in adding.";
    echo "<BR>";
    echo "<a href='home.php'>Back to main page</a>";
}
?>