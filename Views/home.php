<?php
  include($tViews['head']);
?>

  </head>
  <body>

<?php
  include($tViews['menu']);
?>

    <main>
      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Synapse</h1>
            <p class="lead text-muted">Synapse is a blog concerning health and computer science.</p>
          </div>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
              <div class="card shadow-sm">
                <!--
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                -->

        <a href="index.php?action=switch_article&id=1">
          <p>Cliquez ici pour aller sur article.php</p>
        </a>

                <a  href="<?php 'index.php?GET="' . $tViews['article'] . "'"?>">
                   <button type="button" class="btn  btn-outline-light">
                      <img  width="100%" height="225" src="<?php echo $tViews['pictures'] . "heart.jpg"?>"/>
                  </button>
                </a>

                <!-- https://bmcmedinformdecismak.biomedcentral.com/articles -->

                <div class="card-body">
                  <p class="card-text">Cardiovascular diseases (CVDs) are always considered by healthcare specialists for different reasons, including extensive prevalence, increased costs, chronicity, and high risk of death. The control of CVDs is... </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">20 November 2021</small>
                  </div>
                </div>
              </div>
            </div>



            <?php
              $model_news = new Models\NewsModel();
              $tAllnews = $model_news->getAllNews();
            foreach($tAllnews as $news): ?>
              <div class="col">
                <div class="card shadow-sm">
                  <?php  foreach($news->getPictures() as $id_pict):
                   $model_picture = new \Models\PictureModel();
                   $pict = $model_picture->findById($id_pict);
                  
                  echo $news->getId() ?>
                  <a href="<?php echo $news['article'] ?>">
                    <button type="button" class="btn btn-sm btn-outline-light">
                        <img  width="100%" height="225" src="<?php echo $news->getPicture()?>"/>
                    </button>
                  </a>

                  <div class="card-body">
                    <p class="card-text"> <?php echo $news->getDescription(); ?> </p>
                    <div class="d-flex justify-content-between align-items-center">
                      <small class="text-muted">18 November 2021</small>
                    </div>
                  </div>

                </div>
              </div>
            <?php endforeach; ?>


          </div>
        </div>
      </div>


      <nav aria-label="My navigation page">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link"><</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">></a>
          </li>
        </ul>
      </nav>

    </main>

<?php
  include($tViews['footer']);
?>
  </body>
</html>
