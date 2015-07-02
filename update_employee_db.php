<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15-06-2015
 * Time: 17:26
 */
require "db/db.php";
$role=$_POST['role'];
$employee_name=$_POST['dd_employee_name'];

$sql = 'UPDATE Employee SET role = "'.$role.'" WHERE employee_name = "'.$employee_name.'"' ;
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