<?php
  global $rep,$tViews;

  include_once($tViews['head']);
?>
    
    <!-- Custom styles for this template -->
    <link href="<?php echo$tViews['cssSignin']?>" rel="stylesheet">
  </head>

  <body class="text-center">

    <main class="main-signin">
      <a  href="<?php echo $tViews['head'] ?>">
          <button class="btn btn-success" type="button">Home</button>
      </a>

      <div class="d-grid gap-2 col-6 mx-auto">
        <img src="<?php echo $tViews['pictures'] . "heart.jpg"?>" alt="" width="330" height="auto">
      </div>

      <h1 class="h1 mb-3 fw-normal">Sign up</h1>

      <form class="form-signin">

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Login">
          <label for="floatingInput">Login</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
         <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Confirm password</label>
        </div>
        <div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>

        <button class="btn btn-success" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
      </form>
    </main>
    
  </body>
</html>
