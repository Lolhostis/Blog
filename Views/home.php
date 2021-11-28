<?php
  include('head.php');
?>

  </head>
  <body>

<?php
  include('menu.php');
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

                 <button type="button" class="btn  btn-outline-light">
                    <img  width="100%" height="225" src="Resources/Pictures/heart.jpg"/>
                </button>

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

            <div class="col">
              <div class="card shadow-sm">
                <button type="button" class="btn btn-sm btn-outline-light">
                    <img  width="100%" height="225" src="Resources/Pictures/woman-working.jpg"/>
                </button>

                <div class="card-body">
                  <p class="card-text">As the vast majority of women who present in threatened preterm labour (TPTL) will not deliver early, clinicians need to balance the risks of over-medicalising the majority of women, against the potential risk... </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">18 November 2021</small>
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
  include('footer.php');
?>

  </body>
   <script src="Resources/js/bootstrap.bundle.min.js"></script>
</html>
