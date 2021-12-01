<?php
  include('head.php');
?>

    <style>
        .carousel-inner {
          width:75%;
          height:17%;
          margin: 0 auto;
        }
    </style>

  </head>
  <body>

<?php
  include('menu.php');
?>

    <main>
      <section class="py-3 text-center container">
        <h1 class="fw-light">Cardiovascular diseases (CVDs)</h1>

        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="Resources/Pictures/heart.jpg" height="500" class="d-block " alt="Heart picture">
            </div>
            <div class="carousel-item">
              <img src="Resources/Pictures/woman-working.jpg" class="d-block w-100" alt="Heart picture">
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

        <!-- https://bmcmedinformdecismak.biomedcentral.com/articles -->

        <div class="card-body">
          <p class="card-text">Cardiovascular diseases (CVDs) are always considered by healthcare specialists for different reasons, including extensive prevalence, increased costs, chronicity, and high risk of death. The control of CVDs is highly influenced by behavior and lifestyle and it seems necessary to train special abilities about lifestyle and behavior modification to improve self-care skills for patients, and their caregivers. As a result, the development of effective training systems should be considered by healthcare specialists.</p>
          <h2>Methods</h2>
          <p class="card-text">Hence, in this study, a framework for improving cardiovascular patients’ education processes is presented. Initially, an existing training system for cardiovascular patients is reviewed. Using field observations and targeted interviews with hospital experts, all components of its educating processes are identified, and their process maps are drawn up. After that, challenges in the training system are extracted with the aid of in-depth semi-structured interviews with experts. Due to the importance and different influence of the identified challenges, they are prioritized using a Multiple Criteria Decision-making (MCDM) method, and then their root causes were investigated. Finally, a novel framework is proposed and evaluated with hospital experts' help to improve the main challenges.</p>
          <h2>Results</h2>
          <p class="card-text">The most important challenges included high nursing workload and shortage of time, lack of understanding of training concepts by patients, lack of attention to training, disruption of the training processes by the patients’ caregivers, and patient's weakness in understanding the standard language. In identifying the root causes, learner, educator, and educational tools are the most effective in the training process; therefore, the improvement scenarios were designed accordingly in the proposed framework.</p>
          <h2>Conclusions</h2>
          <p class="card-text">Our study indicated that presenting a framework with applying different quantitative and qualitative methods has great potential to improve the processes of patient education for chronic diseases such as cardiovascular disease.</p>
        </div>
      </section>

      <section class="py-3 container">
          <h1 class="fw-light">Comments</h1>

          <table>
            <tbody>
                <tr class="text-center" >
                    <td> <svg class="bd-placeholder-img rounded-circle" width="110" height="110" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 110x110" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="100%" y="100%" fill="#777" dy=".3em">110x110</text></svg> </td>
                    <td rowspan="2"> <p>This article is really interesting !</p> </td>
                </tr>
                <tr>
                    <td class="col align-self-center"> <h2>Pseudo</h2> </td>
                </tr>
            </tbody>

        </table>

      </section>
    </main>

<?php
  include('footer.php');
?>

  </body>
   <script src="Resources/js/bootstrap.bundle.min.js"></script>
</html>
