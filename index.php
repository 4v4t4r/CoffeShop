<?php
session_start();
if(!isset($_GET['select'])){
	header('location:index.php?select=home');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffe Shop Bootstrap</title>
	<?php include 'template/headerinfo.php';?>
	<link href="css/main.css" rel="stylesheet"/>
  </head>
  <body>
  	<!-- NavBar
    ================================================== -->
	<?php
	include 'template/navbar.php';
	?>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>
      <?php
      		
      	include 'template/connection.php';	
		$stockHigh = "SELECT QUANTITY, BEAN FROM stock ORDER BY QUANTITY DESC";
		$res = mysqli_query($connection, $stockHigh);
		$arr = array();
		while($row = mysqli_fetch_assoc($res)){							
			array_push($arr, $row);						
	    }	
		$num = 0;
		$numCount = count($arr);	
		foreach($arr as $r){
			if($num == 0){
				$timequantity = $r['QUANTITY'];
				$timebean = $r['BEAN'];	
			}else if($num == $numCount - 1){
				$quantity = $r['QUANTITY'];
				$bean = $r['BEAN'];				
			}	
			$num++;									
		}
		$query ="SELECT START_TIME, END_TIME FROM promo";
		$result = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($result))
		{
			$start = $row['START_TIME'];
			$end = $row['END_TIME'];
			date_default_timezone_set("Europe/London");
			$current_time = date("H:i:s");
			if($current_time >= $start && $current_time <= $end ){
				$beaninfo = "SELECT * FROM bean WHERE BEAN='$timebean'";
				$beaninfoExec = mysqli_query($connection, $beaninfo);
				while($row = mysqli_fetch_assoc($beaninfoExec)){
				   //Within Time Promotion	
				   carousel($row['BEAN'],$row['INFO'],"Coffee of the Day : <code>". $row['BEAN']."</code>", "20% Offer");
				}
			}else{
				$beaninfo = "SELECT * FROM bean WHERE BEAN='$bean'";
				$beaninfoExec = mysqli_query($connection, $beaninfo);
				while($row = mysqli_fetch_assoc($beaninfoExec)){
				   carousel($row['BEAN'],$row['INFO'],$row['BEAN'],"Our quick moving product, Hurry");
				}	
			}
		}
		
		function carousel($fbean, $finfo,$foffer, $fquote)
		{		
      ?>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $foffer; ?></h1>
              <p><?php echo $finfo; ?></p>
              <p><a class="btn btn-lg btn-primary" href="mailto:buy@coffeeshop.uk?subject=<?php echo $fbean;?>" role="button">Buy Now</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $fbean; ?></h1>
              <p><?php echo $fquote; ?></p>
              <p><a class="btn btn-lg btn-primary" href="mailto:buy@coffeeshop.uk?subject=<?php echo $fbean;?>" role="button">Buy Now</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
	<?php
	}

	if($_GET['select'] == "signin"){
		include 'template/signin.php';
	}else{
		include 'template/indexinfo.php';
	}
	
	?>
  

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 Coffee Shop Ltd. &middot; (Testing Website)<a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>');</script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
