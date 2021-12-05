<?php
namespace Tests;

/**
  /** \author L'HOSTIS Loriane
  /** \date 05/12/2021
  /** \file CommentController.php
  /** \namespace Tests
*/


/** \class Controller of comments CommentController.php
*/
class CommentController {

   /** Constructor of the Comment controller
    */
  function __construct() {
    global $rep,$tViews;
    session_start();

    //initialization of an array of errors
    $tErrors = array();

    try{
      $action=$_REQUEST['action'];

      switch($action) {
        case NULL:
          $this->Reinit();
        break;

        case "get_comment":
          $this->get_comment($tErrors);
        break;

        case "add_comment":
          $this->add_comment($tErrors);
        break;

        case "delete_comment":
          $this->delete_comment($tErrors);
        break;

        default:
          $tErrors[] = "No php view";
          require ($rep.$tViews['view_test_comment']);
          break;
      }

    } catch (PDOException $e){
      $tErrors[] =  "Unexpected error";
       require ($rep.$tViews['error']);
    }catch (Exception $e2){
      $tErrors[] =  "Unexpected error";
      require ($rep.$tViews['error']);
    }

    exit(0);
  }

 /** This function loads the page
  */
  function Reinit() {
  global $rep,$tViews;

    $row_comment = array ();
    require ($rep.$tViews['view_test_comment']);
  }

   /** This function return informations about a comment from the database
    * \param[in, out] tErrors Array of errors
    */
  function get_comment(array $tErrors) {
    global $rep,$tViews;

    $id_comment=$_POST['id_comment'];
    \Config\Validation::val_form_comment_consult($id_comment, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'

    $model_comment = new \Models\CommentModel();

    $data=$model_comment->findById($id_comment); //if there is an exception, it is catched by the case exception in the 'case try'

    $row_comment = array (
      'res_id_comment' => $login_user,
      'res_text_comment' => $data->getText(),
      'res_date_comment' => $data->getDate(),
      'res_hour_comment' => $data->getHour(),
      'res_login_user_comment' => $data->getAuthor()->getLogin(),
      'res_id_news_comment' => $data->getPicture()->getId(),
    );
    require ($rep.$tViews['view_test_comment']);
  }

   /** This function add a user into the database
    * \param[in, out] tErrors Array of errors
    */
  function add_comment(array $tErrors) {
    global $rep,$tViews;

    $id_comment=$_POST['id_comment'];
    $text_comment=$_POST['text_comment'];
    $date_comment=$_POST['date_comment'];
    $hour_comment=$_POST['hour_comment'];
    $login_user_comment=$_POST['login_user_comment'];
    $id_news_comment = $_POST['id_news_comment'];
    \Config\Validation::val_form_comment_add($id_comment, $text_comment, $date_comment, $login_user_comment, $id_news_comment, $tErrors);

    $model_comment = new \Models\CommentModel();

    $result_insert=$model_comment->addComment($id_comment, $text_comment, $date_comment, $login_user_comment, $id_news_comment);

    if($result_insert==true){
      $notification="Comment added";
    }else{
     // tErrors[]="Can't add this user";
      //error view
    }

    require ($rep.$tViews['view_test_comment']);
  }
}
?>









/*
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
*/
