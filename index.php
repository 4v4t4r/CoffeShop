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
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Buy Now</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $fbean; ?></h1>
              <p><?php echo $fquote; ?></p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Buy Now</a></p>
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
	?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <!-- Bean Details are taken from Wikipedia -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="image/drink1.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Coffee Arabica</h2>
          <p>Coffea arabica is a species of Coffea originally indigenous to the forests of the south western highlands of Ethiopia. It is also known as the "coffee shrub of Arabia", "mountain coffee", or "arabica coffee". C. arabica is believed to be the first species of coffee to be cultivated, and is by far the dominant cultivar, representing some 70% of global production.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="image/drink1.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Coffee Robusta</h2>
          <p>Robusta coffee is coffee made from the Coffea canephora plant, a sturdy species of coffee bean with low acidity and high bitterness. C. canephora beans (widely known by the synonym Coffea robusta) are used primarily in instant coffee, espresso, and as a filler in ground coffee blends.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="image/drink1.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Congo Coffee</h2>
          <p>Congo Coffee is a species of Coffea originally indigenous to the forests of the south western highlands of Ethiopia. It is also known as the "coffee shrub of Arabia", "mountain coffee", or "arabica coffee". C. arabica is believed to be the first species of coffee to be cultivated, and is by far the dominant cultivar, representing some 70% of global production.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="image/drink1.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Coffea Liberica</h2>
          <p>Coffea liberica (or Liberian coffee) is a species of flowering plant in the Rubiaceae family. It is a coffee that is native to western and central Africa from Liberia to Uganda and Angola. It is also naturalized in the Seychelles, the Andaman & Nicobar Islands, French Polynesia, Central America, the West Indies, Venezuela, Colombia and Brazil.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="image/drink1.png" alt="Generic placeholder image" width="140" height="140">
          <h2>Coffea Stenophylla</h2>
          <p>Coffea Stenophylla is coffee made from the Coffea canephora plant, a sturdy species of coffee bean with low acidity and high bitterness. C. canephora beans (widely known by the synonym Coffea robusta) are used primarily in instant coffee, espresso, and as a filler in ground coffee blends.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 Coffee Shop Ltd. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
