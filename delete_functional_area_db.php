<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15-06-2015
 * Time: 18:12
 */
require "db/db.php";
$functional_name=$_POST['dd_functional_area'];

$sql = 'DELETE FROM Functional_area where func_name = "'.$functional_name.'"' ;
$result = insertdb($sql);
if($result){
    echo"<br/>Your details have been updated";
    echo "<BR>";
    echo "<a href='home.php'>Back to main page</a>";
}else{
    echo"<br/>There was some error in deleting.";
    echo "<BR>";
    echo "<a href='home.php'>Back to main page</a>";
}
?>