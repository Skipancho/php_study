<?php
	$filename = $_GET["filename"];
	$target_dir = $_GET["target_dir"];

	$file = $_SERVER['DOCUMENT_ROOT']."/".$target_dir."/".$filename;
	$filesize = filesize($file);
	if (is_file($file)) {
		header("Content-type: application/octet-stream"); 
		header("Content-Length: ".filesize("$file"));
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Transfer-Encoding: binary"); 
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: public"); 
		header("Expires: 0"); 

		$fp = fopen($file, "r"); 
		if(!fpassthru($fp)){
			fclose($fp);
		}	    
	}else {
		echo "<script>alert(".$file." not found);</script>";
	}
?>
