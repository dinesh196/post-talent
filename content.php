<?php

$con = mysqli_connect('localhost','root','rootpassword','talent');

/*if($_POST['category']) {

$cat = $_POST['category'];

if(empty($cat) != true) {

	$query = mysqli_query($con, "SELECT * FROM `posts` WHERE `category` = '$cat' ORDER BY `post_id` DESC");

}

else { */

	$query = mysqli_query($con, "SELECT * FROM `posts` ORDER BY `post_id` DESC");

//}

while($row = mysqli_fetch_array($query)) {

	$user_id = $row['user_id'];

	$q = mysqli_query($con, "SELECT * FROM `users` WHERE `user_id` = '$user_id'");
	
	while($duh = mysqli_fetch_array($q)) {
	
		echo '<div style="width:340px;height:auto;padding:10px;background:#fff;border-radius:5px;box-shadow:0 1px 2px #000;">';
	
		echo '<a href="profile.php?user_id=' . $duh['username'] . '">' . $duh['fname'] . ' ' . $duh['lname'] . '</a>';		
		
		echo '<p>' . $row['text'] . '</p>';
		
		if($row['file_type'] == 'video/mp4') {
		
			echo '<video style="width:320px;height:auto;" controls><source  src="uploads/' . $row['file_name'] . '" type="video/mp4">';
		
		}
		
		else {
		
			echo '<img style="width:320px;height:auto;" src="uploads/' . $row['file_name'] . '">';
			
		}
		
		echo '</div><br />';

?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

</script>
</head>
<body>

</body>
</html>

<?php

	}

}

//}

?>