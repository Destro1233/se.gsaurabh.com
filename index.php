<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Sign-In</title>
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body id="body-color">
<div id="Sign-In">

    <fieldset style="width:30%"><legend><b>LOG-IN HERE</b></legend>
    
        <form method="POST" action="login.php">
        	<table>
				<tr>
                	<td class="column" style="padding-right: 2em">User</td>
                    <td class="column"><input type="text" name="username" size="20"></td>
             	</tr>
            	<tr>
                	<td class="column" style="padding-right: 2em">Password</td>
                    <td class="column"><input type="password" name="password" size="20"></td>
               	</tr>
          	</table>
            <input type="submit" style="align-content: center" class="btn btn-default navbar-btn" name="submit" value="Log-In">
        </form>
         <?php
            if (isset($_GET['a'])){
				//echo "<br />ID or Password incorrect";
                echo "<script type='text/javascript'>";
                echo "alert('Wrong user ID or password!')";
                echo "</script>";
	   		}
		?>
    </fieldset>
</div>

</body>
<style>
    .column{
        padding-right: 2cm;
        padding-bottom: 1em;
    }
</style>
</html>