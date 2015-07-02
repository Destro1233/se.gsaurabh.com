<?php
session_start();
if ($_FILES['file']['size'] > 0) {

	if ($_FILES['file']['size'] <= 153600) {
		if (move_uploaded_file($_FILES['file']['tmp_name'], "storage/".$_FILES['file']["name"])) {
			// file uploaded
			$_SESSION['filename'] = $_FILES['file']["name"];
			?>
			<script type="text/javascript">
			parent.document.getElementById("message").innerHTML = "";
			parent.document.getElementById("file").value = "";
			window.parent.updatepicture("<?php echo 'storage/'.$_FILES['file']["name"]; ?>");
			</script>
			<?php
			
		} else {
			// the upload failed
			$_SESSION['filename'] = NULL;
			?>
			<script type="text/javascript">
			parent.document.getElementById("message").innerHTML = "<font color='#ff0000'>There was an error uploading your image. Please try again later.</font>";
			</script>			
			<?php
			
		}
	} else {
		// the file is too big
		$_SESSION['filename'] = NULL;
		?>
		<script type="text/javascript">
		parent.document.getElementById("message").innerHTML = "<font color='#ff0000'>Your file is larger than 150kb. Please choose a different picture.</font>";
		</script>
		<?php
		
	}
	
}else{
	$_SESSION['filename'] = NULL;
	?>
	<script type="text/javascript">
	parent.document.getElementById("message").innerHTML = "<font color='#ff0000'>No file selected. PLease select an image.</font>";
	</script>
	<?php	
}


?>