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
        <h1 class="fw-light">Cardiovascular diseases (CVDs)</h1>

        <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo $tViews['pictures'] . "heart.jpg"?>" height="500" class="d-block " alt="Heart picture">
            </div>
            <div class="carousel-item">
              <img src="<?php echo $tViews['pictures'] . "woman-working.jpg"?>" class="d-block w-100" alt="Woman working picture">
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


      <form method="POST">
          <input placeholder="Title..." 
                      class="w-100 mb-2 text-secondary text-break textarea-comment" 
                      spellcheck="true" wrap="soft" maxlength="30" .resize="none" width="30" name="title_news"> 
                          
          <textarea type="textarea" name="news_description" 
                    placeholder="Write the description of the news please..." 
                    class="w-100 my-2 text-secondary text-break textarea-comment" 
                    spellcheck="true" wrap="soft" maxlength="5000" .resize="none"></textarea>  

          <input type="SUBMIT" name="action" value="add_news"/>                  
      </form>
    </main>

<?php
  include_once($tViews['footer']);
?>

  </body>
   <script src="<?php echo $tViews['bootstrapMinJs']?>"></script>

</html>
