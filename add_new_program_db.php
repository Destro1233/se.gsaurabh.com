<?php
/**
 * Created by PhpStorm.
 * User: Saurabh
 * Date: 14-06-2015
 * Time: 17:15
 */
require "db/db.php";
$program_Name=$_POST['txt_Program_name'];
$version_number=$_POST['version'];
$release=$_POST['release'];
$sql1 = "SELECT * FROM program WHERE program_name='".$program_Name."' and program_number =".$version_number." and program_release=".$release;
$query = rowcount($sql1);


if ($query>0)
{
    echo "Program already exists.";
	echo "<BR>";
    echo "<a href='add_new_program.php'>Back to main page</a>";

}else
{
    $sql = 'INSERT INTO program (program_name,program_number,program_release)
VALUES ("'.$program_Name.'",'.$version_number.','.$release.')';
    $result = insertdb($sql);
    if($result){
        echo"<br/>Your details have been updated";
        echo "<BR>";
        echo "<a href='home_manage_database.php'>Back to main page</a>";
    }
    else
    {
        echo"<br/>There was some error in updating your records. Please try again. " .$result;
        echo "<BR>";
        echo "<a href='home_manage_database.php'>Back to main page</a>";

    }

}

?>