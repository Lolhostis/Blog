<?php
  include($tViews['head']);
?>

  </head>
  <body>

<?php
  include($tViews['menu']);
?>

    <main>
    <?php
      $model_news = new Models\NewsModel();
      $tAllnews = $model_news->findAll();

      ?>
    <p>Number of news : <?php echo count($tAllnews)?> </p>
    <p>Number of connections : <?= isset($_COOKIE['cookieCpt']) ? $_COOKIE['cookieCpt'] : 0 ?> </p>
    <p>Number of comments :  </p>
      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Synapse</h1>
            <p class="lead text-muted">Synapse is a blog concerning health and computer science.</p>
          </div>
        </div>
      </section>

      <!-- https://bmcmedinformdecismak.biomedcentral.com/articles -->

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
              <?php 
                $maxPage = ceil(count($tAllnews) / $nbNewsPerPage);
                $page = max(1, min($page, $maxPage));
                //var_dump($tAllnews);
              //for($tAllnews as $news):
              for($i=$nbNewsPerPage * ($page-1) ; $i<$nbNewsPerPage * $page; $i++){
                if($i >= count($tAllnews)) break;
                $news=$tAllnews[$i];
                ?>

              <div class="col">
                <div class="card shadow-sm">
                  <?php 

                  //var_dump($news);
                  $model_picture = new \Models\PictureModel();
                  if(isset($news->getPictures()[0])){
                    $pict = $model_picture->findById($news->getPictures()[0]);
                  }
                  
                  echo $news->getId(); ?>
                  <a href="<?= "?action=switch_article&id=" . $news->getId() ?>">
                    <button type="button" class="btn btn-sm btn-outline-light">
                        <img  width="100%" height="225" src="<?php echo $tDirectory['news_pictures'] . $pict->getUri()?>"/>
                    </button>
                  </a>

                  <div class="card-body">
                    <p class="card-text"> <?php echo substr($news->getDescription(),0, 200) . '...'; ?> </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                      </div>

                      <small class="text-muted"><?= $news->getDate() ?></small>          <!--November 18th 2021-->            
                    </div>
                  </div>

                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>


      <nav aria-label="My navigation page">
        <ul class="pagination justify-content-center">
          
          <?php 
            if($page>1){ 
          ?>

            <li class="page-item ">
              <a class="page-link" href="<?= "?page=1" ?>"><<</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="<?= "?page=" . ($page - 1) ?>"><?=($page - 1)?></a>
            </li>
          <?php } ?>

          <li class="page-item active"><a class="page-link" href="<?= "?page=".$page ?>"><?=$page?></a></li>

          <?php if($page+1<=$maxPage){ ?>
            <li class="page-item"><a class="page-link"  href="<?= "?page=" .($page +1) ?>"><?=($page +1)?></a></li>
            <li class="page-item">
              <a class="page-link" href="<?= "?page=" . $maxPage ?>">>></a>
            </li>
          <?php } ?>
        </ul>
      </nav>

    </main>

<?php
  include($tViews['footer']);
?>
  </body>
</html>
