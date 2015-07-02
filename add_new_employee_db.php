<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14-06-2015
 * Time: 18:55
 */
require "db/db.php";
$employee_name=$_POST['employee_name'];
$role=$_POST['role'];
$password=$_POST['password'];

$sql='INSERT INTO Employee

(employee_name,role,password) VALUES

("'.$employee_name.'","'.$role.'","'.$password.'")';
$result = insertdb($sql);
if($result){
echo"<br/>Your details have been updated";
echo "<BR>";
echo "<a href='home.php'>Back to main page</a>";
}else{
echo"<br/>There was some error in adding. " .$result;
echo "<BR>";
echo "<a href='home.php'>Back to main page</a>";
}
?>