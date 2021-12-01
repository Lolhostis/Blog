<?php
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Models/PictureModel.php');
    require_once('../Config/Connexion.php');
  require_once('../Config/Validation.php');

        if( isset($_POST['action']) ) {
        $errors = "";
        $pmodel = new PictureModel();

          if( $_POST['action']=="Get picture" ) {
            $picture="";
            Validation::val_form_picture_consult($_POST['id_picture'], $errors);
            if( !empty($errors) ) {
              echo "NO VALID FORM !</br>".$errors."</br>";
            }
            try {
              $picture = $pmodel->findByID($_POST['id_picture']);
            }
            catch (Exception $exception) {
              echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
            }

            if( $picture!="" ) {
              echo "Resulting Picture : ".$picture->toString()."</br>";
            }
          }

        if( $_POST['action']=="Add picture" ) {

          Validation::val_form_picture_add($_POST['id_picture'], $_POST['uri'], $_POST['alt'], $errors);
          if( !empty($errors) ) {
            echo "NO VALID FORM !</br>".$errors."</br>";
          }
          else {
            try {
              if( $pmodel->addPicture($_POST['id_picture'], $_POST['uri'], $_POST['alt']) ) {
                echo "Success</br>";
              }
              else {
                echo "Failure</br>";
              }
            }
            catch (Exception $exception) {
              echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
            }
          }
          $_POST = [];
        }
    }
?>

























