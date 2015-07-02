<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15-06-2015
 * Time: 18:32
 */
require "db/db.php";
$employee_name=$_POST['dd_employee_name'];

$sql = 'DELETE FROM Employee  WHERE employee_name = "'.$employee_name.'"' ;
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
?>