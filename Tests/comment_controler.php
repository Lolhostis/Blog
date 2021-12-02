<?php
  require_once('../Jobs/Comment.php');
  require_once('../Jobs/News.php');
  require_once('../Jobs/Picture.php');
  require_once('../Jobs/User.php');
  require_once('../Models/CommentModel.php');
  require_once('../Config/Connexion.php');
  require_once('../Config/Validation.php');

class CommentControler {

  function __construct() {

    //initialization of an array of errors
    $TErrors = array();

    try {
      $action=$_REQUEST['action'];

      switch($action) {
        case NULL:
          $this->Reinit();
        break;

        case 'get_comment':
          $this->get_comment($TErrors);
          break;

        case 'add_comment':
          $this->add_comment($TErrors);
          break;
      }
    }
  }

  function get_comment(array $TErrors) {
    $id_comment=$_POST['id_comment'];
    Validation::val_form_comment_consult($id_comment, $TErrors);

    if(TErrors.count()==0) {
      $model_comment=new CommentModel();
      try {
        $comment=$model_comment->findByIdBis($id_comment);
      } catch(Exception e) {
        TErrors[] = $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
        //error view
      }

      $row_Comment = array (
        'res_id_comment' => $id_comment,
        'res_text_comment' => $comment->getText(),
        'res_date_comment' => $comment->getDate(),
        'res_login_user_comment' => $comment->getAuthor()->getPseudo()
      );
      //require comment view
    }
    else {
      //require error view
    }
  }

  function add_comment(array $TErrors) {
    $id_comment=$_POST['id_comment'];
    Validation::val_form_comment_consult($id_comment, $TErrors);

    if(TErrors.count()==0) {
      $model_comment=new CommentModel();
      try {
        $comment=$model_comment->findByIdBis($id_comment);
      } catch(Exception e) {
        TErrors[] = $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
        //error view
      }

      $row_Comment = array (
        'res_id_comment' => $id_comment,
        'res_text_comment' => $comment->getText(),
        'res_date_comment' => $comment->getDate(),
        'res_login_user_comment' => $comment->getAuthor()->getPseudo()
      );
      //require comment view
    }
    else {
      //require error view
    }
  }

}



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
