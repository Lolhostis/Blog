<?php
  global $rep,$tViews;
  include_once($tViews['head']);
?>
    
    <!-- Custom styles for this template -->
    <link href="<?php echo$tViews['cssSignin']?>" rel="stylesheet">
  </head>
  <body class="text-center">

    <main class="main-signin">

      <a href="index.php">
          <button class="btn btn-success" type="button">Home</button>
      </a>

      <div class="d-grid gap-2 col-6 mx-auto">
        <img src="<?php echo $tViews['pictures'] . "heart.jpg"?>" alt="" width="330" height="auto">
        <a  href="<?= '?action=switch_sign_up' ?>">
          <button class="btn btn-success" type="button">New user ?</button>
        </a>
      </div>

      <h1 class="h1 mb-3 fw-normal">Sign in</h1>

      <p>If you have already an account, please sign in</p>
<!--
      <form class="form-signin"  method="post" name="myform">

      
        
        <div class="form-floating">
          <input type="password" name="password_user" value="" class="form-control" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
      -->
      <form method="POST" action="index.php">
      <p>Login : <input type="TEXT" name="login_user" value="<?=$_POST['login_user']??""?>" required/></p>
      <p>Password : <input type="TEXT" name="password_user" value="" required/></p>

      <!--  <button class="btn btn-success" type="submit">Sign in</button> --> 
        <p><input type="SUBMIT" name="action" value="signin_user"/></p>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
    </main>
    
  </body>
</html>
