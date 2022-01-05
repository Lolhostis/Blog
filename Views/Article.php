<?php
  include($tViews['head']);

  $model_news = new \Models\NewsModel();
  $news = $model_news->findById($_REQUEST['id']);
?>

    <style>
        .carousel-inner {
          width:75%;
          height:17%;
          margin: 0 auto;
        }

        textarea {
            font-size: 20px;
            width: 100%;
            margin: auto;
        }

        table{
          margin: 5px;
          border-collapse: separate;
        }

        td {
          padding: 5px;
        }

        h1, h5{
          text-align: center;
        }

        .textarea-comment:focus {
          box-shadow: 0 3px 0 0 #198754;
          border-radius : 0px;
        }

        .textarea-comment{
            border-bottom: 3px solid #198754;
            border-radius : 5px;
        }

        ::placeholder{
            color: #198754;
        }

    </style>

  </head>
  <body>

<?php
  include_once($tViews['menu']);
?>

    <main>
      <section class="py-3 container">

      <h1 class="fw-light"><?= $news->getTitle()?></h1>

        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <?php foreach($news->getPictures() as $id_pict): ?>
              <div class="carousel-item active">
                <?php
                  $model_picture = new \Models\PictureModel();
                  $pict = $model_picture->findById($id_pict);
                ?>
                <img src="<?php echo $tDirectory['news_pictures'] . $pict->getUri()?>" class="d-block w-100" alt="<?=$pict->getAlt()?>">
              </div>
            <?php endforeach; ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <div class="card-body">
          <p class="card-text"><?=$news->getDescription()?></p>
        </div>

        <p class="card-text">Date : <?=$news->getDate()?></p>
        <p class="card-text">Author : <?=$news->getAuthor()->getPseudo()?></p>
      </section>

      <section class="py-3 container">
          <h1 class="fw-light">Comments</h1>

          <div class="w-100 row">
            <div class="col-md-2 col-xl-3 col-12 d-flex flex-column justify-content-center align-items-center">

                <?php
                  $model_user = new \Models\UserModel();
                ?>
                <img class="w-50 rounded-circle" src="<?= isset($_SESSION['login']) ? $tDirectory['user_pictures'] . $model_user->findByLogin($_SESSION['login'])->getPicture()->getUri() : $tViews['pictures'] . 'no_data_found.png'?>"> </td>

                <?php 
                  if (isset($_SESSION['login'])){
                ?>
                    <h5><?= $_SESSION['login'] ?></h5>
                <?php 
                    }
                ?>

            </div>   
            <div class="px-3 col-md-8 col-xl-6 col-12 flex-column d-flex justify-content-center align-items-center">

                <form method="POST" action=<?= "?id=".$_GET['id'] ?>>
                    <div class="row w-100">
                        
                        <?php 
                          if (!isset($_SESSION['login'])){
                        ?>
                            <div class="col-3 d-flex justify-content-end px-0">
                                <label for="login_comment">Pseudo : </label>
                            </div>
                            
                        <?php 
                          }
                        ?>

                        <div class="col-9">
                            <?php 
                              if (!isset($_SESSION['login'])){
                            ?>
                                <input placeholder="login..." 
                                            class="w-100 mb-2 text-secondary text-break textarea-comment" 
                                            spellcheck="true" wrap="soft" maxlength="30" .resize="none" width="30" name="login_comment"> 
                            <?php } ?>               

                                <textarea type="textarea" name="text_comment" 
                                        placeholder="Write a comment please..." 
                                        class="w-100 my-2 text-secondary text-break textarea-comment" 
                                        spellcheck="true" wrap="soft" maxlength="5000" .resize="none"></textarea>

                            <input type="SUBMIT" name="action" value="add_comment"/>
                        </div>
                    </div> 

                    
                </form>
              
            </div>             
          </div>

          <?php
          $model_comment = new Models\CommentModel();
          foreach($news->getCommentList() as $id_comment): 
              $comment=$model_comment->findById($id_comment);
          ?>
            <div class="w-100 row">
              <div class="col-md-2 col-xl-3 col-12 d-flex flex-column justify-content-center align-items-center">
                  <img class="w-25 rounded-circle" src="<?php echo $tDirectory['user_pictures'] . $comment->getAuthor()->getPicture()->getUri()?>"> </td>

                  <h5><?= $comment->getAuthor()->getPseudo()?></h5>
              </div>   
            <div class="px-3 col-md-8 col-xl-6 col-12 flex-column d-flex justify-content-center align-items-center">
                <div class="row w-100">
                    <div class="col-9">
                        <p class="text-secondary text-md-start text-break"><?= $comment->getText() ?></p> 
                    </div>
                </div>               
            </div>             
          </div>
          <?php endforeach; ?>
      </section>
    </main>

<?php
  include_once($tViews['footer']);
?>

  </body>
   <script src="<?php echo $tViews['bootstrapMinJs']?>"></script>

</html>
