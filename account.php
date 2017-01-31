<?php session_start(); 

if(!isset($_SESSION['USERNAME'])){
	header('location:index.php');
}

?>
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
				<form class="form login-form" method="post" action="account.php?select=account">
					<div class="input-group">
 						 <span class="input-group-addon" id="basic-addon1">@</span>
  						 <input type="text" class="form-control" aria-describedby="basic-addon1" name="username" placeholder="Username">
					</div></br>
					<div class="input-group">
 						 <span class="input-group-addon" id="basic-addon1">@</span>
  						 <input type="text" class="form-control" aria-describedby="basic-addon1" name="password" placeholder="Password">
					</div>	</br>
					<input type="submit" class="btn btn-success" id="btnId" name="submit" value="Add User"/>		
				</form>
			</br>
			<button class="btn btn-danger" type="button">
  				Total User <span class="badge"><?php 
  						include 'template/connection.php';
						$query ="SELECT USERNAME FROM users";
						$result = mysqli_query($connection, $query);
						$num = mysqli_num_rows($result);
						echo $num;
  					?></span>
			</button>
			</div>
				<?php
					if(isset($_POST['submit'])){
						if(isset($_POST['username']) && isset($_POST['password']))
						{
							$username = htmlentities(trim($_POST['username']));
							$password = htmlentities(trim($_POST['password']));
							
							$hash = md5($password."coffeshop");
							
							include 'template/connection.php';
							$query ="INSERT INTO users (USERNAME, PASSWORD) VALUES ('$username','$hash')";
							$result = mysqli_query($connection, $query);
							if($result){
								$message = "User Successfully Created";
								header('location:account.php?select=account');
							}else{
								$message = "User created failed";
								header('location:account.php?select=account');
							}
							
						}	
					}	
				?>
		</div>
	</div>
	<!-- promotion time -->
	<div class="container">
		<div class="boxcontain">
			<div id="promotime">
				<h3>Promotion Times</h3>
				<form method="post" action="account.php?select=account">
					Start Time :<input type="time" name="starttime"/></br></br>
					End Time :<input type="time" name="finishtime"/></br></br>
					<input type="submit" class="btn btn-success" id="btnId" name="timeSubmit" value="Add Timer"/>		
				</form></br>
					<button class="btn btn-danger" type="button">
	  					Start Time <span class="badge"><?php 
						$query ="SELECT START_TIME FROM promo";
						$result = mysqli_query($connection, $query);
						while($row = mysqli_fetch_assoc($result))
						{
							$start = $row['START_TIME'];
							echo $start;
						}
  					?></span>
					</button>
					<button class="btn btn-danger" type="button">
	  					End Time <span class="badge"><?php 
						$query ="SELECT END_TIME FROM promo";
						$result = mysqli_query($connection, $query);
						while($row = mysqli_fetch_assoc($result))
						{
							$end = $row['END_TIME'];
							echo $end;
						}
  					?></span>
					</button>
			</div>	
			<?php
			if(isset($_POST['timeSubmit']))
			{
				if(isset($_POST['starttime']) && isset($_POST['finishtime'])){
					$start = $_POST['starttime'];
					$end = $_POST['finishtime'];
					$sql = "UPDATE promo SET START_TIME='$start', END_TIME='$end' WHERE ID='1'";
					$result = mysqli_query($connection, $sql);
					if($result == TRUE){
						echo '<script type="text/javascript">alert("Successfully Updated")</script>';
					}else{
						echo '<script type="text/javascript">alert("Not Updated")</script>';
					}
				}			
			}			
			?>		
		</div>
	</div>
	
	<!-- Items time -->
	<div class="container">
		<div class="boxcontain">

		</div>
	</div>
  </body>