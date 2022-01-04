<?php
namespace Controllers;
use \Models\UserModel;
use \Config\Validation;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 04/01/2022
  /** \file AdminController.php
  /** \namespace Controllers
*/

/** \class Controller of admins AdminController.php
*/
class AdminController {

   /** 
    * Constructor of the Admin controller
    */
  function __construct(array &$tErrors, string $action) {
    global $rep,$tViews;

    try{
      switch($action) {
        case "add_news":
          $this->add_news($tErrors);
        break;

        case "delete_news":
          $this->delete_news($tErrors);
        break;

        default:
          //We normally won't go there
          // as the action has been verified in the front controller
          $tErrors[] = "No php control for action : ".$action;
          require ($rep.$tViews['error']);
      }
    }catch (\PDOException $e){
      $tErrors[] =  $e->getMessage();
      require ($rep.$tViews['error']);
    }catch (\Exception $e){
      $tErrors[] =  $e->getMessage();
      require ($rep.$tViews['error']);
    }

    exit(0);
  }

   /** This function return informations about a comment from the database
    * \param[in, out] tErrors Array of errors
    */
  function add_news(array &$tErrors) {
    global $rep,$tViews;

    $id_comment=$_POST['id_comment'];
    Validation::val_form_comment_consult($id_comment, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['view_test_comment']);
      return;
    }

    $model_comment = new CommentModel();

    try{
      $data=$model_comment->findById($id_comment); //if there is an exception, it is catched by the case exception in the 'case try'

      $row_comment = array (
        'res_id_comment' => $id_comment,
        'res_text_comment' => $data->getText(),
        'res_date_comment' => $data->getDate(),
        'res_login_user_comment' => $data->getAuthor()->getPseudo(),
      );
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
    }        
    require ($rep.$tViews['view_test_comment']);
  }

     /** This function delete a comment from the database
    * \param[in, out] tErrors Array of errors
    */
    function delete_news(array &$tErrors) {
      global $rep,$tViews;
  
      $id_comment=$_POST['id_comment'];
      Validation::val_form_comment_consult($id_comment, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'
      if(count($tErrors)>0){
        require ($rep.$tViews['error']);
        require ($rep.$tViews['view_test_comment']);
        return;
      }

      $model_comment = new CommentModel();

      try{
        $result_delete = $model_comment->deleteComment($id_comment); //if there is an exception, it is catched by the case exception in the 'case try'
     
        if($data=false){
          $tErrors[]="Error to delete a comment";
          require ($rep.$tViews['error']);
        }
        else{
          $row_comment = array (
            'res_delete' => "Comment deleted"
          );
        }
      }catch(\Exception $e){
        $tErrors[] = $e->getMessage();
        require ($rep.$tViews['error']);
      }        
      require ($rep.$tViews['view_test_comment']);
    } 

   /** This function add a user into the database
    * \param[in, out] tErrors Array of errors
    */
  function add_comment(array &$tErrors) {
    global $rep,$tViews;

    $id_comment=$_POST['id_comment'];
    $text_comment=$_POST['text_comment'];
    $date_comment=$_POST['date_comment'];
    $login_user_comment=$_POST['login_user_comment'];
    $id_news_comment = $_POST['id_news_comment'];
    Validation::val_form_comment_add($id_comment, $text_comment, $date_comment, $login_user_comment, $id_news_comment, $tErrors);
    if(count($tErrors)>0){
      require ($rep.$tViews['error']);
      require ($rep.$tViews['view_test_comment']);
      return;
    }
    
    $model_comment = new CommentModel();

    try{
      $result_insert=$model_comment->addComment($id_comment, $text_comment, $date_comment, $login_user_comment, $id_news_comment);

      $row_comment = array (
        'res_insert' => "Comment added"
      );
    }catch(\Exception $e){
      $tErrors[] = $e->getMessage();
      require ($rep.$tViews['error']);
    }        
    require ($rep.$tViews['view_test_comment']);
  }
}
?>

