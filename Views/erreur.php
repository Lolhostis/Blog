<?php
  $path = dirname(__DIR__);
  if(!isset($path)){
    if(!empty($path)){
        $path = $path . "\\";
    }
  }
   require_once($path . "Views\\head.php");
  $src = $path . "Resources\Pictures\\error.png";
?>

  </head>
   <body class="text-center">

  <main class="px-3">
      <p></br></br></p>
      <img height="25%" src="<?php echo "$src" ?>"/>

 <p class="lead">
<?php
  if( isset($TMessage) ) {
    foreach($TMessage as $key => $value) {
      echo $key." :</br>";
      foreach($value as $msg) {
        echo "\t".$msg."</br>";
      }
    }
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
