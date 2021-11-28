<?php
  include('head.php');
?>

  </head>
   <body class="text-center">

  <main class="px-3">
      <p></br></br></p>
      <img height="25%" src="Resources/Pictures/error.png"/>

 <p class="lead">
<?php
    foreach($TMessage as $key => $value){
      echo "<br/>$key - $value<br/>";
    }
?>
</p>
      <a  href="home.php">
        <button class="btn btn-secondary me-md-2" type="button">Home</button>
      </a>
  </main>

  </body>
   <script src="Resources/js/bootstrap.bundle.min.js"></script>
</html>
