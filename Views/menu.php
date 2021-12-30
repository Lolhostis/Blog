<?php global $rep,$tViews; ?>
<header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">

            <nav class="navbar navbar-dark bg-dark">
              <div class="container-fluid">
                  <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Menu</h4>
                    <p class="text-muted">Synapse is a blog concerning health and computer science.</p>
                  </div>

                <form class="d-flex" method="get" action="index.php">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
                  <button class="btn btn-outline-success" type="submit" value="search_news">Search</button>
                </form>
                 <a href="<?php echo $tViews['sign_in'] ?>">
                    <button class="btn btn-light me-md-2" type="button">Sign in/up</button>
                </a>
              </div>
            </nav>

          </div>
        </div>
      </div>

      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-caret-up-square" viewBox="0 -4 20 20">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M3.544 10.705A.5.5 0 0 0 4 11h8a.5.5 0 0 0 .374-.832l-4-4.5a.5.5 0 0 0-.748 0l-4 4.5a.5.5 0 0 0-.082.537z"/>
            </svg>
            <strong>Synapse Menu</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
