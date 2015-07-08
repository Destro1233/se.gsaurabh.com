<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 6/27/2015
 * Time: 2:23 PM
 */
session_start();
require "db/db.php";
$program = $_POST['program'];
$version = $_POST['version'];
$release = $_POST['release'];
$report_type=$_POST['report_type'];
$severity=$_POST['severity'];

$problem_summary=$_POST['problem_summary'];
$problem=$_POST['problem'];
$suggested_fix=$_POST['suggested_fix'];

$reported_date=$_POST['reported_date'];

if(isset($_POST['reproducible'])) {
    $reproducible = 1;
}else{
    $reproducible = 0;
}

$sql = 'select * from Employee where employee_id="'.$_POST['reportedby'].'"';
$reported_by=db($sql)->fetch_assoc();
$reported_by="$reported_by[name]";

$sql = 'select * from program where program_name="'.$program.'" AND program_number="'.$version.'" AND program_release="'.$release.'"';
$resultProgram=db($sql);

$row=$resultProgram->fetch_assoc();
$program_id="$row[program_id]";

$sql = 'select * from Bug;';
$result=db($sql);
$sql = 'INSERT INTO Bug (program_id,Report_Type,Severity,Reproducible,Problem_Summary,Problem,Suggested_fix,Reported_by,Reported_date)VALUES('.$program_id.',"' . $report_type . '","' . $severity. '","' . $reproducible. '","' . $problem_summary. '","' . $problem. '","' . $suggested_fix. '","'.$reported_by.'","' . $reported_date. '")';


$result = insertdb($sql);
if ($result) {
    echo "<br/>Your details have been updated";
    echo "<BR>";
    echo "<a href='home.php'>Back to main page</a>";
} else {
    echo "<br/>There was some error in adding. " . $result;
    echo "<BR>";
    echo "<a href='home.php'>Back to main page</a>";
}
echo "<br/>";
echo $_SESSION['filename']; 
//Insert this variable into query as attachment.

?>