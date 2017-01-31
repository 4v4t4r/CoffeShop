<?php

if(isset($_POST['submit'])){
	
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		session_start();
		$username = htmlentities(trim($_POST['username']));
		$password = htmlentities(trim($_POST['password']));
		
		$hash = md5($password."virudhunagar");
		
		include 'connection.php';
		$query = "SELECT * FROM users WHERE USERNAME='$username' AND PASSWORD='$hash'";
		$result = mysqli_query($connection, $query);
		$num = mysqli_num_rows($result);
		if($num == 1)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$user = $row['USERNAME'];
				$auth = $row['ACCESS'];
				
				$_SESSION['USERNAME'] = $user;
				$_SESSION['ACCESS'] = $auth;
				header('location:../home.php');
			}	
		}else{
			$_SESSION['error'] = "Incorrect Username and Password";
			header('location:../index.php');
		}		
	}
}						
?>