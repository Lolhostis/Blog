<?php
  include('head.php');
?>

  </head>
    <body class="text-center">

      <main class="px-3">
        <p></br></br></p>
        <img height="35%" src="<?= "Views/Resources/Pictures/error.png" ?>" />

        <p class="lead">
          <?php
          if( isset($tErrors) ) {
            foreach($tErrors as $value) {
              echo $value ."</br>";
            }
          }
          ?>
        </p>
            <!-- <a href="<?=$tViews['home']?>"> -->
            <a href="index.php">
		          <button class="btn btn-secondary me-md-2" type="button">Home</button>
		        </a>
      </main>

    </body>
   <script src="Resources/js/bootstrap.bundle.min.js"></script>
</html>
