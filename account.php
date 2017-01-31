<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyAccount</title>
	<?php include 'template/headerinfo.php';?>
	<link href="css/main.css" rel="stylesheet" />
  </head>
  <body id="account_body">
  	<?php
	include 'template/navbar.php';
	?>
	<div class="container">
		<div class="boxcontain" id="topcontain">
			<div id="adduser_container">
				<h3>Add User</h3>
				<form class="form login-form" method="post" action="account.php">
					<div class="input-group">
 						 <span class="input-group-addon" id="basic-addon1">@</span>
  						 <input type="text" class="form-control" aria-describedby="basic-addon1" name="username" placeholder="Username">
					</div></br>
					<div class="input-group">
 						 <span class="input-group-addon" id="basic-addon1">@</span>
  						 <input type="text" class="form-control" aria-describedby="basic-addon1" name="password" placeholder="Password">
					</div>	</br>
					<button type="button" class="btn btn-success" id="btnId" name="submit">Add User</button>				
				</form>
			</br>
			<button class="btn btn-danger" type="button">
  				Total User <span class="badge">4</span>
			</button>
			</div>
				<?php
					if(isset($_POST['submit'])){
						if(isset($_POST['username']) && isset($_POST['password']))
						{
							session_start();
							$username = htmlentities(trim($_POST['username']));
							$password = htmlentities(trim($_POST['password']));
							
							$hash = md5($password."coffeshop");
							
							include 'connection.php';
							$query ="INSERT INTO users (USERNAME, PASSWORD) VALUES ('$username','$hash')";
							echo $query;
							$result = mysqli_query($connection, $query);
							if($result){
								echo "User Successfully Created";
							}else{
								echo "User created failed";
							}
						}	
					}	
				?>
		</div>
	</div>
	<div class="container">
		<div class="boxcontain">

		</div>
	</div>
  </body>