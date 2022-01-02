<?php
  global $rep,$tViews;
  include_once($rep . DIRECTORY_SEPARATOR . $tViews['head']);
?>

  </head>
  <body>

<?php
  include_once($tViews['menu']);
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

            <div class="col">
              <div class="card shadow-sm">
                <a href="<?php echo $tViews['article'] ?>">
                  <button type="button" class="btn btn-sm btn-outline-light">
                      <img  width="100%" height="225" src="<?php echo $tViews['pictures'] . $rowSearch['picture_name']?>"/>
                  </button>
                </a>

                <div class="card-body">
                  <p class="card-text"> <?php  $rowSearch['news_description_cut'] ?> </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted"><?php $rowSearch['news_date'] ?></small>
                    <small class="text-muted"><?php $rowSearch['news_pseudo'] ?></small>
                  </div>
                </div>

              </div>
            </div>

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
  include_once($tViews['footer']);
?>

  </body>
  <script src="<?php echo $tViews['bootstrapMinJs']?>"></script>
</html>
