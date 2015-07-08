<?php
session_start();
@include("./function.php");
if (priorityFunc($_SESSION['priority'])) {
    header("Location: ./index.php");
    exit();
}
include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Export</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="javascripts/jquery-1.10.12.js"></script>
</head>
<body class="dashboard">
<div id="wrap">
<div class="container">
<h2>Select Table</h2>
<script type="text/javascript">
function showCustomer(str)
{
var xmlhttp;    
if (str=="")
  {
  document.getElementById("input").value="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("input").value=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","table_program.php?file="+str,true);
xmlhttp.send();
}
</script>
<select name="table" id="table1">
<option></option>
<option value="program">Program</option>
<option value="Employee">Employee</option>
<option value="Functional_area">Functional Area</option>
<option value="Bug">Bug</option>
<option value="login">Login</option>
</select>

<div>
<textarea class="form-control fixed-width " rows="5" id="input">Col1 Col2 Col3
Value 1 Value 2 123
Separate cols with a tab or 4 spaces
This is a row with only one cell</textarea>
<script type="text/javascript">
$( "#table1" )
.change(function () {
alert( this.value );
if ( this.value == "program" ){
	$( "#input" ).load( "db/table_program.php", function( response, status, xhr ) {
		if ( status == "error" ) {
			var msg = "Sorry but there was an error: ";
			$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
		}
	});
}
}).change();
</script>
<div id="controls">
<div class="row">
<label for="hdr-style" class="control-label">Header</label>
<div>
<select class="form-control" id="hdr-style">
<option value="none">None</option>
<option value="top" selected="true">First Row</option>
<option value="ssheet">Spreadsheet</option>
</select>
</div>
</div>
<div class="row">
<label for="auto-format" class="control-label">Center</label>
<div class="">
<input class="form-control" id="auto-format" checked="true" type="checkbox">
</div>
</div>
<div class="row">
<label for="style" class="control-label">Style</label>
<div>
<select id="style" class="form-control">
<option value="0">Ascii (mysql style)</option>
<option value="2">Ascii (alt style)</option>
<option value="3">Ascii (compact)</option>
<option value="1">Unicode</option>
<option value="gfm">Github Markdown</option>
<option value="html">HTML</option>
</select>
</div>
</div>
</div>
<button class="btn bt-lg btn-primary" onclick="createTable()">Create Table</button>
</div>
<h2>Output:</h2>
<div id="outputText" >
<textarea id="output" class="form-control fixed-width" rows="8" ></textarea>
<button class="btn bt-lg btn-primary" onclick="parseTableClick()">Parse Table</button>
</div>
<div id="outputTbl"></div>
</div>
</div>
<div id="test">

</div>
</body>
</html>