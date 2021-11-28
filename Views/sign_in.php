<?php
  include('head.php');
?>
    
    <!-- Custom styles for this template -->
    <link href="Resources/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

    <main class="main-signin">

      <a  href="home.php">
          <button class="btn btn-success" type="button">Home</button>
      </a>
      <p/>

      <div class="d-grid gap-2 col-6 mx-auto">
        <img src="Resources/Pictures/heart.jpg" alt="" width="330" height="auto">
        <a  href="sign_up.php">
          <button class="btn btn-success" type="button">New user ?</button>
        </a>
      </div>

      <h1 class="h1 mb-3 fw-normal">Sign in</h1>

      <p>If you have already an account, please sign in</p>

      <form class="form-signin"  method="post" name="myform">

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Login">
          <label for="floatingInput" name="txtNom" value="<?= $dVue['nom']  ?>" type="text" size="30">Login</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>

         <p/>
        <button class="btn btn-success" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
    </main>
    
  </body>
</html>
