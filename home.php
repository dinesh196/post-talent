<?php

$con = mysqli_connect('localhost','root','rootpassword');

$db = mysqli_select_db($con, 'talent');

session_start();

//if(isset($_COOKIE['user'])) {

$cookie = 'akash_raj'; //$_COOKIE['user'];

$main = mysqli_query($con, "SELECT * FROM `users` WHERE `user_id` = '$cookie'");

//}

?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Tallento-forum
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="./site.css" rel="stylesheet" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
<script>

$(document).ready(function() {
	$('.content').load('content.php');	
});

$(document).ready(function() {
	$('#upload').on('click',function(e) {
		e.preventDefault();
		$('.overlay').css('display','block');
	});
});

$(document).ready(function() {
	$('#black_screen').on('click',function() {
		$('.overlay').css('display','none');
		$('#upload_form').trigger('reset');
	});
});

$(document).ready(function() {
	$('#upload_form').on('submit',function(d) {
		d.preventDefault();
		
		$.ajax({
			url: "upload.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(response) {
				alert(response);		
				$('.overlay').css('display','none');
				$('#upload_form').trigger('reset');
				$('.content').load('content.php');
			}
		});
	});
});

</script>

</head>

<body class="">

<div class="overlay" style="display:none;">

	<div id="black_screen" style=" width:100%; height:100%;z-index:2000;background:rgba(0,0,0,0.6);position:fixed; " ></div>
	
	<div id="upload_box" style="position:fixed;z-index:2500;">

		<form id="upload_form">

			<textarea id="upload_text" name="upload_text" placeholder="Type something"></textarea>
			
			<div id="attach_bar"><input type="file" name="upload_file" id="upload_file" /></div>
			
			<input type="submit" id="upload_submit" value="Upload" />

		</form>

	</div>

</div>
  
  <div class="wrapper ">
    <div class="sidebar" data-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
   
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Tallento-forum
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" >
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active ">
            <a class="nav-link" >
              <i class="material-icons">Music</i>
              <p>Music</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" >
              <i class="material-icons">Videos</i>
              <p>Videos</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" >
              <i class="material-icons">Sketch</i>
              <p>Sketch</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" >
              <i class="material-icons">Poems</i>
              <p>Poems</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" >
              <i class="material-icons">Random</i>
              <p>Random</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">

      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="profile.php?user_id=<?php echo $cookie; ?>">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-11">
              <div class="card">
         
                <div class="card-body">
                  
                <p> The content goes here </p>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>

    </div>
    <div>
        <a href="#" id="upload" class="float">
            <i class="fa fa-plus my-float"></i>
          </a>
    </div>
  </div>
  
</body> 

</html>

<?php



?>