<?php
  global $rep,$tViews;
  include_once($tViews['head']);
?>

  </head>
    <body class="text-center">

      <main class="px-3">
        <p></br></br></p>
        <img height="35%" src="<?php echo $tViews['pictures'] . DIRECTORY_SEPARATOR . "error.png"?>" />

        <p class="lead">
          <?php
            if( isset($tErrors) ) {
              foreach($tErrors as $value) {
                echo $value ."</br>";
              }
            }
          ?>
        </p>
        
            <a href=".">
		          <button class="btn btn-secondary me-md-2" type="button">Home</button>
		        </a>
      </main>

    </body>
   <script src="<?php echo $tViews['bootstrapMinJs']?>"></script>
</html>
