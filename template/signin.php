<div class="container" id="signin_container">

  <form class="form-signin" method="post" action="template/logincheck.php">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required autofocus><br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"/>
  </form>

</div> <!-- /container -->
