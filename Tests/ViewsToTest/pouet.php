<?php
    global $rep, $tViews;
    require($rep.$tViews['head']);
?>

  </head>
    <body class="text-center">

      <main class="px-3">
          <div class="card shadow-sm">
            <a  href="<?=$rep .$tViews['view_test_picture']?>">
                <button type="button" class="btn btn-sm btn-outline-light">
                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                </button>
            </a>
           </div>

           <div class="card shadow-sm">
           <a  href="<?=$rep.$tViews['view_test_user']?>">
                <button type="button" class="btn btn-sm btn-outline-light">
                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                </button>
            </a>
           </div>

           <div class="card shadow-sm">
           <a  href="<?=$rep.$tViews['view_test_news']?>">
                <button type="button" class="btn btn-sm btn-outline-light">
                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                </button>
            </a>
           </div>

           <div class="card shadow-sm">
           <a  href="<?=$rep.$tViews['view_test_comment']?>">
                <button type="button" class="btn btn-sm btn-outline-light">
                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                </button>
            </a>
           </div>
      </main>
    </body>
    
    <script src="Resources/js/bootstrap.bundle.min.js"></script>
</html>
