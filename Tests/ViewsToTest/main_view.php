<?php
    global $rep, $tViews;
    require($rep.$tViews['head']);
?>

  </head>
    <body class="text-center">

      <main class="px-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <!-- <a href="<?=$rep.$tViews['view_test_picture']?>"> -->
                            <a href="index.php?action=manage_picture">
                                <button type="button" class="btn btn-sm btn-outline-light">
                                    Picture
                                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <!-- <a href="<?=$rep.$tViews['view_test_user']?>"> -->
                            <a href="index.php?action=manage_user">
                                <button type="button" class="btn btn-sm btn-outline-light">
                                    User
                                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <!-- <a href="<?=$rep.$tViews['view_test_news']?>"> -->
                            <a href="index.php?action=manage_news">
                                <button type="button" class="btn btn-sm btn-outline-light">
                                    News
                                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <!-- <a href="<?=$rep.$tViews['view_test_comment']?>"> -->
                            <a href="index.php?action=manage_comment">
                                <button type="button" class="btn btn-sm btn-outline-light">
                                    Comment
                                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
<?php /*
          <div class="card shadow-sm">
            <!-- <a href="<?=$rep.$tViews['view_test_picture']?>"> -->
            <a href="index.php?action=manage_picture">
                <button type="button" class="btn btn-sm btn-outline-light">
                    Picture
                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                </button>
            </a>
           </div>

           <div class="card shadow-sm">
           <!-- <a href="<?=$rep.$tViews['view_test_user']?>"> -->
           <a href="index.php?action=manage_user">
                <button type="button" class="btn btn-sm btn-outline-light">
                    User
                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                </button>
            </a>
           </div>

           <div class="card shadow-sm">
           <!-- <a href="<?=$rep.$tViews['view_test_news']?>"> -->
           <a href="index.php?action=manage_news">
                <button type="button" class="btn btn-sm btn-outline-light">
                    News
                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                </button>
            </a>
           </div>

           <div class="card shadow-sm">
           <!-- <a href="<?=$rep.$tViews['view_test_comment']?>"> -->
           <a href="index.php?action=manage_comment">
                <button type="button" class="btn btn-sm btn-outline-light">
                    Comment
                    <img  width="100%" height="200" src="Resources/Pictures/woman-working.jpg"/>
                </button>
            </a>
           </div>
*/?>
      </main>
    </body>
    
    <script src="Resources/js/bootstrap.bundle.min.js"></script>
</html>
