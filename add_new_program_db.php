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
/*$query1="SELECT program_name FROM program WHERE program_name=$program_Name";
*/

if ($query>0)
{
    echo "Program already exists";
}else
{
    $sql = 'INSERT INTO program (program_name,program_number,program_release)
VALUES ("'.$program_Name.'",'.$version_number.','.$release.')';
    $result = insertdb($sql);
    if($result){
        echo"<br/>Your details have been updated";
        echo "<BR>";
        echo "<a href='home.php'>Back to main page</a>";
    }
    else
    {
        echo"<br/>There was some error in updating your records. Please try again. " .$result;
        echo $sql;
        echo "<BR>";
        echo "<a href='home.php'>Back to main page</a>";

    }

}

?>