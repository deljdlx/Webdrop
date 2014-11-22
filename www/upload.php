<?php
if(!empty($_FILES)) {
	foreach($_FILES as $file) {
	
		$fileId=uniqid(true);
		
		$uploadFilepath=__DIR__.'/../uploaded';
		$filepath=$uploadFilepath.'/'.$fileId;
		mkdir($filepath);
		
		$result=move_uploaded_file($file['tmp_name'], $filepath.'/file.data');
		file_put_contents($filepath.'/meta.json', json_encode($file));
		
		echo $fileId;
		
	}
	exit();
}
