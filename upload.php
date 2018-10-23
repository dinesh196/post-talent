<?php

//session_start();

//$id = $_COOKIE['user'];
	
if(isset($_FILES["upload_file"]["type"]) && $_FILES["upload_file"]["name"] != '') {

	$valid_extensions = array("jpeg", "jpg", "png", "gif", "JPG", "JPEG", "PNG", "Jpg", "Jpeg", "mp4", "wmv");
	
	$temporary = explode(".", $_FILES["upload_file"]["name"]); 
	
	$file_extension = end($temporary);
	
	if(in_array($file_extension,$valid_extensions)) {
	
		if($_FILES['upload_file']['size'] > 5242880) {
		
			echo 'File size is too big';
			
		}
		
		else {
		
			$name = $_FILES['upload_file']['name'];
			
			$size = $_FILES['upload_file']['size'];
			
			$name = str_replace('#', '_', $name);
			
			$type = $_FILES['upload_file']['type'];
			
			$extension = strtolower($type);
			
			$file = $_FILES['upload_file']['tmp_name'];
			
			$time = time('hh:mm:ss');
			
			$final = $time . '_' . $name;
			
			$final = htmlspecialchars($final);
			
			$target = 'uploads/' . $final;
			
			move_uploaded_file($file,$target);
		
		}
		
	}
	
	else {
	
		echo 'Invalid file';
		
	}
	
}

else {

	$final = '';
	
	$size = '';
	
	$extension = '';

}

$text = $_POST['upload_text'];

if($text != '') {

	$special = array(":", "'");
	
	$replace = array("\:", "\'");
	
	$text = str_replace($special, $replace, $text);

}

if($text != '' && $final != '') {

	$con = mysqli_connect('localhost','root','rootpassword','talent');
	
	mysqli_query($con, "INSERT INTO `posts` (`post_id`, `user_id`, `text`, `file_name`, `file_type`, `file_size`, `points`, `category`) VALUES (`post_id`,'1','$text','$final','$extension','$size','0','general')");
	
	echo 'Successfully uploaded!';

}



?>