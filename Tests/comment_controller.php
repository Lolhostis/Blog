<?php
  require_once('../Config/Validation.php');
  require_once('../Jobs/Comment.php');
  require_once('../Jobs/News.php');
  require_once('../Jobs/Picture.php');
  require_once('../Jobs/User.php');
  require_once('../Models/CommentModel.php');
  require_once('../Config/Connexion.php');
  require_once('../Config/Validation.php');

  /* Debug
      var_dump($_POST);
      echo "</br>";
      */
      if( isset($_POST['action']) ) {
  $errors = "";
  $cmodel = new CommentModel();

  if( $_POST['action']=="Get comment" ) {
    $comment="";
    Validation::val_form_comment_consult($_POST['id_comment'], $errors);
    if( !empty($errors) ) {
      echo "NO VALID FORM !</br>".$errors."</br>";
    }
    try {
      $comment = $cmodel->findByIdBis($_POST['id_comment']);
    }
    catch (Exception $exception) {
      echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
    }

    if( $comment!="" ) {
      echo "Resulting Comment : ".$comment->toString()."</br>";
    }
  }

  if( $_POST['action']=="Add comment" ) {

    Validation::val_form_comment_add($_POST['id_comment'], $_POST['text'], $_POST['date'], $_POST['login_user'], $_POST['id_news'],$errors);
    if( !empty($errors) ) {
      echo "NO VALID FORM !</br>".$errors."</br>";
    }
    else {
      try {
        if( $cmodel->addComment($_POST['id_comment'], $_POST['text'], $_POST['date'], $_POST['login_user'], $_POST['id_news']) ) {
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
