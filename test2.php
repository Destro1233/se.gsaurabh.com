<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>change demo</title>
<style>
div {
color: red;
}
</style>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
<select name="sweets" id="sweets">
<option>Chocolate</option>
<option selected="selected">Candy</option>
<option>Taffy</option>
<option selected="selected">Caramel</option>
<option>Fudge</option>
<option>Cookie</option>
</select>
<div></div>
<div id="asd"></textarea>
<script>
$( "#sweets" )
.change(function () {
alert( this.value );
$( "#asd" ).load( "db/table_program.php", function( response, status, xhr ) {
if ( status == "error" ) {
var msg = "Sorry but there was an error: ";
$( "#error" ).html( msg + xhr.status + " " + xhr.statusText );
}
});
}).change();

</script>
</body>
</html>