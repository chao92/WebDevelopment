<?php require_once "phpuploader/include_phpuploader.php" ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>PHP Upload - Simple Upload with Progress</title>
	<link href="demo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="demo">
        <h2>Upload your VM here</h2>
        <p> (Allowed file types: <span style="color:red">zip</span>).
		<p>
		<?php
			$uploader=new PhpUploader();
			
			$uploader->MultipleFilesUpload=false;
			$uploader->InsertText="Upload File (Max 4GB)";
			
			$uploader->MaxSizeKB=4194304;
			$uploader->AllowedFileExtensions="zip";
			
			//Where'd the files go?
			$uploader->SaveDirectory="/media/workspace/genomeprivacy_upload";
			
			$uploader->Render();
		?>
		</p>	
		
	<script type='text/javascript'>
	function CuteWebUI_AjaxUploader_OnTaskComplete(task)
	{
		alert(task.FileName + " is uploaded!");
	}
	</script>	
	</div>
</body>
</html>
