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
$sql1 = "SELECT * FROM Employee WHERE employee_name='".$employee_name."' and Role =".$role."";
$query = rowcount($sql1);


if ($query>0)
{
    echo "Employee already exists.";
    echo "<BR>";
    echo "<a href='add_new_employee.php'>Back to main page</a>";

}else
{
    {
        $sql='INSERT INTO Employee

(employee_name,role,password) VALUES

("'.$employee_name.'","'.$role.'","'.$password.'")';
        $result = insertdb($sql);
        if($result){
            echo"<br/>Your details have been updated";
            echo "<BR>";
            echo "<a href='home_manage_database.php'>Back to main page</a>";
        }else{
            echo"<br/>Employee name already exist. " .$result;
            echo "<BR>";
            echo "<a href='add_new_employee.php'>Back to main page</a>";
        }
    }
}


?>