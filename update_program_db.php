<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 15-06-2015
 * Time: 16:43
 */
require "db/db.php";
$program_name=$_POST['txt_program_name'];
$old_program_name=$_POST['dd_program_name'];

$sql = 'UPDATE program SET program_name = "'.$program_name.'" WHERE program_name = "'.$old_program_name.'"' ;
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