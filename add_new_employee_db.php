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
$query = mysql_query("SELECT COUNT(employee_name) FROM Employee WHERE employee_name='".$employee_name."'");
/*$query1="SELECT program_name FROM program WHERE program_name=$program_Name";
echo $query1;
*/
if ($query > 0)
{
    echo "Program already exists";
}
else
{
    $sql='INSERT INTO Employee

(employee_name,role,password) VALUES

("'.$employee_name.'","'.$role.'","'.$password.'")';
    $result = insertdb($sql);
    if($result){
        echo"<br/>Your details have been updated";
        echo "<BR>";
        echo "<a href='home.php'>Back to main page</a>";
    }else{
        echo"<br/>Employee name already exist. " .$result;
        echo "<BR>";
        echo "<a href='home.php'>Back to main page</a>";
    }
}


?>