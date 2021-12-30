<?php
  global $rep,$tViews;
  echo $rep. 'index.php';
  include($rep. 'index.php');
  include($tViews['head']);
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

      <section class="py-3 container">
          <h1 class="fw-light">Comments</h1>

          <table>
            <tbody>
                <tr class="text-center margin-x" >
                    <td>  <img class="rounded-circle" src="<?php echo $tViews['pictures'] . 'no_data_found.png'?>"> </td>
                    <td rowspan="2">
                        <textarea placeholder="Write a comment please..." 
                        class="text-secondary text-break textarea-comment" 
                        autofocus="true" spellcheck="true" wrap="soft" maxlength="5000" .resize="none"></textarea>
                       
                        <?php 
                          if (!isset($_SESSION['pseudo'])){
                        ?>
                            <p>Login : </p>
                            <textarea placeholder="login..." 
                                      class="text-secondary text-break textarea-comment" 
                                      spellcheck="true" wrap="soft" maxlength="30" .resize="none" width="30"></textarea> 
                        <?php 
                          }
                        ?>


                        <form method="POST">
                            <p>id of the comment: <input type="INT" name="id_comment" value="<?=$_POST['id_comment']??""?>" required/></p>
                            <p>text : <input type="TEXT" name="text_comment" value="<?=$_POST['text_comment']??""?>"/></p>

                            <textarea placeholder="Write a comment please..." 
                                      class="text-secondary text-break textarea-comment" 
                                      autofocus="true" spellcheck="true" wrap="soft" maxlength="5000" .resize="none"></textarea>

                            <p>date : <input type="DATETIME-LOCAL" name="date_comment" value="<?=$_POST['date_comment']??""?>"/></p>
                            <p>login of the user : <input type="TEXT" name="login_user_comment" value="<?=$_POST['login_user_comment']??""?>"/></p>
                            <p>id of the corresponding news : <input type="INT" name="id_news_comment" value="<?=$_POST['id_news_comment']??""?>"/></p>
                            <p><input type="SUBMIT" name="action" value="get_comment"/></p>
                            <p><input type="SUBMIT" name="action" value="add_comment"/></p>
                            <p><input type="SUBMIT" name="action" value="delete_comment"/></p>
                            <p><input type="RESET" /></p>
                        </form>

                        <div>
                            <?php if( isset($row_comment) && !empty($row_comment) )
                            {
                            ?>
                                <p>Results :</p>
                                <?php if( isset($_POST['action']) && $_POST['action']=="get_comment" )
                                {
                                ?>
                                    <p>Id : <?= $row_comment['res_id_comment'] ?? "" ?></p>
                                    <p>Text : <?= $row_comment['res_text_comment'] ?? "no text" ?></p>
                                    <p>Date : <?= $row_comment['res_date_comment'] ?? "" ?></p>
                                    <p>User Login : <?= $row_comment['res_login_user_comment'] ?? "" ?></p>
                                    <!-- <p>Id associated news : <?= $row_comment['res_id_news_comment'] ?? "" ?></p> -->
                                <?php
                                }
                                else if( isset($_POST['action']) && $_POST['action']=="add_comment" )
                                {
                                ?>
                                    <p>Result Insert : <?= $row_comment['res_insert'] ?? "" ?></p>
                                <?php
                                }
                                else if( isset($_POST['action']) && $_POST['action']=="delete_comment" )
                                {
                                ?>
                                    <p>Result Delete : <?= $row_comment['res_delete'] ?? "" ?></p>
                                <?php
                                }
                                ?>
                            <?php
                            }
                            ?>
                        </div>


                        <a href="<?php echo $tViews['article']?>">
                            <button class="btn btn-outline-success">Add comment</button>
                          </a>
                    </td>
                </tr>
                <tr>
                    <td class="col align-self-center"> <h5>Pseudo</h5> </td>
                </tr>
            </tbody>
          </table>

          <table>
            <tbody>
                <tr class="text-center margin-x" >
                    <td>  <img class="rounded-circle" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.webp"/> </td>
                    <!-- <svg class="bd-placeholder-img rounded-circle" width="110" height="110" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 110x110" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="100%" y="100%" fill="#777" dy=".3em">110x110</text></svg> -->
                    <td rowspan="2"> <p class="text-secondary text-md-start text-break">This article is really interesting !</p> </td>
                </tr>
                <tr>
                    <td class="col align-self-center"> <h5>Laura</h5> </td>
                </tr>
            </tbody>
          </table>

          <table>
            <tbody>
                <tr class="text-center margin-x" >
                    <td>  <img class="rounded-circle" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.webp"/> </td>
                    <td rowspan="2"> <p class="text-secondary text-md-start text-break">Thanks for the informations, it was really interesting !</p> </td>
                </tr>
                <tr>
                    <td class="col align-self-center"> <h5>Loïc</h5> </td>
                </tr>
            </tbody>
          </table>

      </section>
    </main>

<?php
  include_once($tViews['footer']);
?>

  </body>
   <script src="<?php echo $tViews['bootstrapMinJs']?>"></script>

</html>
