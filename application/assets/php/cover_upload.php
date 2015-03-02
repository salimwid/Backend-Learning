<?php
//require_once('awslog.php');
if(isset($_FILES['file'])) {
	print_r($_FILES);
	list($width, $height, $type, $attr) = getimagesize($_FILES['file']['tmp_name']);
	//$filename = $_POST['imageName'].'.jpeg';
	if ( $_FILES['file']['type'] == 'image/jpg'
	|| $_FILES['file']['type'] == 'image/jpeg'
	|| $_FILES['file']['type'] == 'image/pjpeg')
	{
	
	$characters = 'abcdefghijklmn123456789ABCDEFGHIJKLMNOPQRSTUVpqrstuvwxyz';
	$characters2 = '123456789';
	$filename = '';
			for ($i = 0; $i < 10; $i++) {
				     $filename .= $characters[rand(0, strlen($characters) - 1)];
			}
			$filename .="_";
			for ($i = 0; $i < 5; $i++) {
				     $filename .= $characters2[rand(0, strlen($characters2) - 1)];
			}
			$filename .='_'.'cover.jpeg'; 
			
	$file = "../../media/images/".$filename;
	
	//unlink($file);
		if(move_uploaded_file($_FILES["file"]["tmp_name"], "../../media/images/".$filename)) {				
		    checkWidth();
			if($width >1200){	
				if(ImgResizerWidth($file,$width,$filename)){
				echo $width.','.$height.','.$filename;		
				}
				else{
					echo 2;
				}
			}
			else{
				echo $width.','.$height.','.$filename;
			}		
		}else {
		    echo 2;
		}
	} 
	
	else if ( $_FILES['file']['type'] == 'image/png')
	{
//	$filename = rand(5, 18000).$_POST['userId'];
	$characters = 'abcdefghijklmn123456789ABCDEFGHIJKLMNOPQRSTUVpqrstuvwxyz';
	$characters2 = '123456789';
	$filename = '';
			for ($i = 0; $i < 10; $i++) {
				     $filename .= $characters[rand(0, strlen($characters) - 1)];
			}
			$filename .="_";
			for ($i = 0; $i < 5; $i++) {
				     $filename .= $characters2[rand(0, strlen($characters2) - 1)];
			}
			
	$filepng = $filename.'cover.png'; 
	$filejpgname = $filename.'cover.jpeg'; 
	$filejpg = "../../media/images/".$filejpgname; 
	$file = "../../media/images/".$filepng;
	
	//unlink($file);
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {		
			
		    checkWidth();
			if($width >1200){
				if(ImgResizerWidthPNG($file,$width,$filejpg,$filepng)){
					//checkHeight();
					echo $width.','.$height.','.$filepng;
				}
				else{
					echo 2;
				}
			}
			else{
				echo $width.','.$height.','.$filepng;
			}
		}
		else {
		  	echo 2;
		}
	  }
}
else {
	echo 1;
}
	
function checkWidth(){
	global $width,$height;
	
	if($width > 1200){
	$ratio = 1200/$width;
	$width = 1200;
	$height = $height * $ratio;
    }
}


function ImgResizerWidth($originalFile,$width,$filename) {

	$newWidth = $width;
	$targetFile = $originalFile;
		if (empty($newWidth) || empty($targetFile)) {
			return false;
		}
		$src = imagecreatefromjpeg($originalFile);
		list($width, $height) = getimagesize($originalFile);
		$newHeight = ($height / $width) * $newWidth;
		$tmp = imagecreatetruecolor($newWidth, $newHeight);
		imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		if (file_exists($targetFile)) {
			//unlink($targetFile);
		}
		if(imagejpeg($tmp, $targetFile, 100)){
		
		} 
		
		
}

function ImgResizerWidthPNG($originalFile,$width,$target,$filename) {
		$newWidth = $width;
		$targetFile = $target;
			if (empty($newWidth) || empty($targetFile)) {
				return false;
			}
			$src = imagecreatefrompng($originalFile);
			list($width, $height) = getimagesize($originalFile);
			$newHeight = ($height / $width) * $newWidth;
			$tmp = imagecreatetruecolor($newWidth, $newHeight);
			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
			if (file_exists($targetFile)) {
				unlink($targetFile);
			}
			if(imagejpeg($tmp, $targetFile, 100)){
				echo $filename;
			} 

}		



