<?php
session_start();
@include("./function.php");
if (priorityFunc($_SESSION['priority'])) {
    header("Location: ./index.php");
    exit();
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Bughound: Add new Bug</title>
</head>
<div class="margin custom">
    <body bgcolor="#2e2e2e">
    <div style="text-align: center; padding-top: 0px">
        <h1 style="color:white;font-size: 50px">Bughound</h1>
    </div>
    <div class="effect8">
        <h3 style="color:Black;font-size: 50px">Database Maintenance</h3>


        <div class="tableMargin">
            <table style="alignment:  center; font-size: large">
                <tr>
                    <td>Program</td>
                    <td class="td">
                        <select class="dropdown">
                            <option value="volvo">Volvo</option>
                            <option value="saab">saab</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="td">Report Type</td>
                    <td class="td">
                        <select class="dropdown">
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
                        <select class="dropdown">
                            <option value="minor">Minor</option>
                            <option value="serious">Serious</option>
                            <option value="fatal">Fatal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="td">Functional Area</td>
                    <td><input type="text" name="functional_area"></td>
                </tr>
                <tr>
                    <td class="td">Assigned To</td>
                    <td><input type="text" name="assigned_to"></td>
                </tr>
                <tr>
                    <td class="td">Status</td>
                    <td>
                        <select class="dropdown">
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="td">Priority</td>
                    <td>
                        <select class="dropdown">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="td">Resolution</td>
                    <td>
                        <select class="dropdown">
                            <option value="1">1</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="td">Reported By</td>
                    <td><input type="text" name="reported_by"></td>
                </tr>
                <tr>
                    <td class="td">Reported Date</td>
                    <td><input name="reported_date" type="date"></td>
                </tr>
                <tr>
                    <td class="td">Resolved By</td>
                    <td><input type="text" name="reported_by"></td>
                </tr>
            </table>
            <button class="btn btn-primary">Search</button>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>

    </div>

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

