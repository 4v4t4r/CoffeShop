    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Coffee Shop Ltd</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li <?php
                	if($_GET['select'] == "home")
					{
						echo 'class="active"';
					}
                ?>><a href="index.php?select=home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <?php if(isset($_SESSION['USERNAME']))
                	{?>
                		 <li <?php
		                	if($_GET['select'] == "account")
							{
								echo 'class="active"';
							}
		                	?>><a href="account.php?select=account">My Account</a></li>
                	<?php }else{             
                ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Log In <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="signin.php">User Login</a></li>
                    <li><a href="signin.php">Store Login</a></li>
                  </ul>
                </li>
                <?php
					}				
					if(isset($_SESSION['USERNAME'])){
						echo '<li><a href="template/logout.php">Log Out</a></li>';
					}
                ?>
                
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>