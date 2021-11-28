<?php
  include('head.php');
?>

  </head>
  <body>

<?php
  include('menu.php');
?>

    <main>
      <section class="py-3 text-center container">
            <h1 class="fw-light">Titre</h1>

            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="Resources/Pictures/heart.jpg" height="500" class="d-block " alt="...">
                </div>
                <div class="carousel-item">
                  <img src="Resources/Pictures/woman-working.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="..." class="d-block w-100" alt="Image alt">
                </div>
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


                <img class="rounded mx-auto d-block" height="500" src="Resources/Pictures/heart.jpg"/>

            <!-- https://bmcmedinformdecismak.biomedcentral.com/articles -->

            <div class="card-body">
              <p class="card-text">Cardiovascular diseases (CVDs) are always considered by healthcare specialists for different reasons, including extensive prevalence, increased costs, chronicity, and high risk of death. The control of CVDs is... </p>
            </div>
      </section>

      <section class="py-3 container">
          <h1 class="fw-light">Comments</h1>

          <div class="container">
              <div class="row">
                  <div class="col-sm-1">
                     <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

                      <h2 align="center">Pseudo</h2>
                  </div>

                  <div class="col">
                    <p>This article is really interesting !</p>
                  </div>
              </div>
          </div>
      </section>
    </main>

<?php
  include('footer.php');
?>

  </body>
   <script src="Resources/js/bootstrap.bundle.min.js"></script>
</html>
