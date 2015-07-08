<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 7/2/2015
 * Time: 1:11 AM
 */
require "db/db.php";
$program = $_POST['program'];
$version = $_POST['version'];
$release = $_POST['release'];
$report_type = $_POST['report_type'];
$severity = $_POST['severity'];
$problem_summary = $_POST['problem_summary'];
$problem = $_POST['problem'];
$suggested_fix = $_POST['suggested_fix'];
$reported_date = $_POST['reported_date'];
//$functional_area = $_POST['functional_area'];
$assigned_to=$_POST['assigned_to'];
$comments=$_POST['comments'];
$status=$_POST['status'];
$priority=$_POST['priority'];
$resolution=$_POST['resolution'];
$resolution_version=$_POST['resolution_version'];
$resolved_by=$_POST['resolved_by'];
$resolved_date=$_POST['resolved_date'];
$tested_by=$_POST['tested_by'];
$tested_date=$_POST['tested_date'];
$deferred=$_POST['deferred'];
$bug_id=$_GET['bugid'];

if (isset($_POST['reproducible'])) {
    $reproducible = 1;
} else {
    $reproducible = 0;
}

if (isset($deferred)) {
    $deferred = 1;
} else {
    $deferred = 0;
}

$sql = 'select * from Employee where employee_id="' . $_POST['reportedby'] . '"';
$reported_by = db($sql)->fetch_assoc();
$reported_by = "$reported_by[name]";


$sql = 'select * from Employee where employee_id="' . $assigned_to . '"';
$assigned_to = db($sql)->fetch_assoc();
$assigned_to = "$assigned_to[name]";

$sql = 'select * from Employee where employee_id="' . $resolved_by . '"';
$resolved_by = db($sql)->fetch_assoc();
$resolved_by = "$resolved_by[name]";

$sql = 'select * from Employee where employee_id="' . $tested_by. '"';
$tested_by = db($sql)->fetch_assoc();
$tested_by = "$tested_by[name]";

$sqlProgram = 'select * from program where program_name="' . $program . '" AND program_number="' . $version . '" AND program_release="' . $release . '"';
$resultProgram = db($sqlProgram);

$row = $resultProgram->fetch_assoc();
$program_id = "$row[program_id]";

$sql = 'Update Bug set program_id=' . $program_id . ',Report_Type="' . $report_type . '",treat_as_deferred="' . $deferred. '",Severity="' . $severity . '",Reproducible="' . $reproducible . '",Problem_Summary="' . $problem_summary . '",Problem="' . $problem . '",Suggested_fix="' . $suggested_fix . '",Reported_by="' . $reported_by . '",Reported_date="' . $reported_date . '",Assigned_to="' . $assigned_to . '",priority="' . $priority . '",comments="' . $comments . '",status="' . $status . '",resolution="' . $resolution . '",resolution_version="' . $resolution_version. '",resolution_date="' . $resolved_date . '",resolution_by="' . $resolved_by . '",resolution_tested_by="' . $tested_by . '",resolution_tested_date="' . $tested_date . '" where Bug_ID="' . $bug_id . '";';
$newSql = wordwrap($sql, 50);
echo "$newSql";
echo "$sqlProgram";

echo "\n";
echo "$program_id";
//}
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
?>
