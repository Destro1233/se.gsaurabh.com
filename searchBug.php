<?php
session_start();
@include("./function.php");
/**if (priorityFunc($_SESSION['priority'])) {
 * header("Location: ./index.php");
 * exit();
 * }*/
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Bughound: Add new Bug</title>
</head>
<div class="margin custom">
    <body bgcolor="#2e2e2e">
    <form method="post" action="search_bug_db.php">
        <div style="text-align: center; padding-top: 0px">
            <h1 style="color:white;font-size: 50px">Bughound</h1>
        </div>
        <div class="effect8">
            <table>
                <tr>
                    <td>
                        <div style="padding-left: 250px;padding-top: 10px">
                            <img src="images/Search%20bug.jpg" style="width:150px;height:150px;">
                        </div>
                    </td>
                    <td class="td1">
                        <div>
                            <h3 style="color:Black;font-size: 50px">Search</h3>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="tableMargin">
                <table style="alignment:  center; font-size: large">
                    <tr>
                        <td>Program</td>
                        <td class="td">
                            <select class="dropdown" name="program">
                                <option value="All">All</option>
                                <?php
                                require "db/db.php";
                                $sql = "SELECT Distinct(program_name) FROM program";
                                $result = db($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $program_name = $row['program_name'];
                                    echo '<option name ="' . $program_name . '">' . $program_name . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Report Type</td>
                        <td class="td">
                            <select class="dropdown" name="report_type">
                                <option value="All">All</option>
                                <option value="coding_error">Coding Error</option>
                                <option value="design_issue">Design Issue</option>
                                <option value="suggestion">Suggestion</option>
                                <option value="documentation">Documentation</option>
                                <option value="hardware">Hardware</option>
                                <option value="query">Query</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Severity</td>
                        <td class="td">
                            <select class="dropdown" name="severity">
                                <option value="All">All</option>
                                <option value="minor">Minor</option>
                                <option value="serious">Serious</option>
                                <option value="fatal">Fatal</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Functional Area</td>
                        <td class="td">
                            <select class="dropdown" name="functional_area">
                                <option value="All">All</option>
                                <?php
                                $sql = "SELECT * FROM Functional_area";
                                $result = db($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $func_name = $row['func_name'];
                                    echo '<option name ="' . $func_name . '">' . $func_name . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Assigned To</td>
                        <td>
                            <select class="dropdown" name="assigned_to">
                                <option value="All">All</option>
                                <?php
                                $sql = 'SELECT employee_name FROM Employee where Role="programmer"';
                                $result = db($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $emp_name = $row['employee_name'];
                                    echo '<option name ="' . $emp_name . '">' . $emp_name . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Status</td>
                        <td>
                            <select class="dropdown" name="status">
                                <option value="All">All</option>
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Priority</td>
                        <td>
                            <select class="dropdown" name="priority">
                                <option value="All">All</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Resolution</td>
                        <td>
                            <select class="dropdown" name="resolution">
                                <option>All</option>
                                <option> Pending                             </option>
                                <option >Fixed
                                </option>
                                <option >Irreproducible
                                </option>
                                <option >Deferred
                                </option>
                                <option >As designed
                                </option>
                                <option >Can't be fixed
                                </option>
                                <option >Withdrawn by reporter
                                </option>
                                <option >Need more info
                                </option>
                                <option >Disagree with suggestion
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Reported By</td>
                        <td>
                            <select class="dropdown" name="reported_by">
                                <option value="All">All</option>
                                <?php
                                $sql = "SELECT DISTINCT(Reported_by)FROM Bug";
                                $result = db($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $reported_by = $row['Reported_by'];
                                    echo "<option value='".$row['Reported_by']."'>$reported_by</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Reported Date</td>
                        <td>
                            <select class="dropdown" name="reported_date">
                                <option value="All">All</option>
                                <?php
                                $sql = "SELECT Distinct(Reported_date) FROM Bug";
                                $result = db($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $reported_date = $row['Reported_date'];
                                    echo '<option name ="' . $reported_date . '">' . $reported_date . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Resolved By</td>
                        <td>
                            <select class="dropdown" name="resolved_by">
                                <option value="All">All</option>
                                <?php
                                $sql = 'SELECT resolution_by FROM Bug';
                                $result = db($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $res_by = $row['resolution_by'];
                                    echo '<option name ="' . $res_by . '">' . $res_by . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="td">Resolved Date</td>
                        <td>
                            <select class="dropdown" name="resolved_date">
                                <option value="All">All</option>
                                <?php
                                $sql = "SELECT resolution_date FROM Bug";
                                $result = db($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $res_date = $row['resolution_date'];
                                    echo '<option name ="' . $res_date . '">' . $res_date . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <input id="search_button" type="submit" name="submit" value="Search">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>

        </div>
    </form>
    </body>
</div>
<style>
    .effect8 {
        border: 1px solid #999;
        -webkit-box-shadow: 1px 2px 5px 0 #000000;
        -moz-box-shadow: 1px 2px 5px 0 #000000;
        box-shadow: 0px 0px 100px 0 #000000;
        background-color: white;
    }

    .table {
        border-collapse: collapse;
    }

    .dropdown {
        width: 175px;
    }

    .td {
        padding-top: 1em;
        padding-bottom: 1em;
        padding-right: 1cm;
    }

    .td1 {
        padding-top: 3em;
    }

    .margin {
        margin-top: 100px;
        margin-bottom: 25px;
        margin-right: 150px;
        margin-left: 150px;
    }

    .tableMargin {
        margin-top: 50px;
        margin-right: 75px;
        margin-left: 75px;
    }

</style>
<style type="text/css">
    .custom {
        font-family: sans-serif;
    }
</style>
</html>

