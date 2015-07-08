<?php
/**
 * Created by PhpStorm.
 * User: varun
 * Date: 6/30/2015
 * Time: 3:40 PM
 */
require "db/db.php";
$program = $_POST['program'];
$report_type = $_POST['report_type'];
$severity = $_POST['severity'];
$functional_area = $_POST['functional_area'];
$assigned_to = $_POST['assigned_to'];
$status = $_POST['status'];
$priority = $_POST['priority'];
$resolution = $_POST['resolution'];
$reported_by = $_POST['reported_by'];
$reported_date = $_POST['reported_date'];
$resolved_by = $_POST['resolved_by'];
$resolved_date = $_POST['resolved_date'];

$sql = 'Select * from Bug';
$isset = false;

/*$program = "All";
$report_type = "All";
$severity = "All";
$functional_area = "All";
$assigned_to = "All";
$status = "Open";
$priority = "All";
$resolution = "All";
$reported_by = "All";
$reported_date = "All";
$resolved_by = "All";
$resolved_date = "All";*/

if (isset($program) && strcmp($program, "All") != 0) {
    $sql = $sql . ' Where program_id in(Select program_id from program where program_name="' . $program . '")';
    $isset = true;
}

if (isset($report_type) && strcmp($report_type, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and Report_Type="' . $report_type . '"';
    } else {
        $sql = $sql . 'Where Report_Type="' . $report_type . '"';
        $isset = true;
    }
}
if (isset($severity) && strcmp($severity, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and Severity="' . $severity . '"';
    } else {
        $sql = $sql . 'Where Severity="' . $severity . '"';
        $isset = true;
    }
}
/*if (isset($functional_area) && !strcmp($functional_area, "All")) {
    if ($isset == true) {
        $sql . ' and Severity="' . $functional_area . '"';
    } else {
        $sql . 'Where Severity="' . $functional_area . '"';
        $isset = true;
    }
}*/
if (isset($assigned_to) && strcmp($assigned_to, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and Assigned_to="' . $assigned_to . '"';
    } else {
        $sql = $sql . ' Where Assigned_to="' . $assigned_to . '"';
        $isset = true;
    }
}

if (isset($status) && strcmp($status, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and status="' . $status . '"';
    } else {
        $sql = $sql . ' Where status="' . $status . '"';
        $isset = true;
    }
}
if (isset($priority) && strcmp($priority, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and priority="' . $priority . '"';
    } else {
        $sql = $sql . ' Where priority="' . $priority . '"';
        $isset = true;
    }
}
if (isset($resolution) && strcmp($resolution, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and resolution="' . $resolution . '"';
    } else {
        $sql = $sql . ' Where resolution="' . $resolution . '"';
        $isset = true;
    }
}
if (isset($reported_by) && strcmp($reported_by, "All") != 0) {
    if ($isset == true) {
        echo $reported_by;
        $sql = $sql . ' and Reported_by="' . $reported_by . '"';
    } else {
        $sql = $sql . ' Where Reported_by="' . $reported_by . '"';
        $isset = true;
    }
}
if (isset($reported_date) && strcmp($reported_date, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and Reported_date="' . $reported_date . '"';
    } else {
        $sql = $sql . ' Where Reported_date="' . $reported_date . '"';
        $isset = true;
    }
}
if (isset($resolved_by) && strcmp($resolved_by, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and resolution_by="' . $resolved_by . '"';
    } else {
        $sql = $sql . ' Where resolution_by="' . $resolved_by . '"';
        $isset = true;
    }
}
if (isset($resolved_date) && strcmp($resolved_date, "All") != 0) {
    if ($isset == true) {
        $sql = $sql . ' and resolution_date="' . $resolved_date . '"';
    } else {
        $sql = $sql . ' Where resolution_date="' . $resolved_date . '"';
        $isset = true;
    }
}

//$sql=$sql.';';
$result = db($sql);
echo $sql;
while ($row = mysqli_fetch_array($result)) {
    echo "<a href=updatebug.php?bugid=" . $row['Bug_ID'] . ">" . $row['Bug_ID'] . "</a></br>";

}

/*foreach($result as $row){
    echo $row;
}*/
?>