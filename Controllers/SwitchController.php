<?php
namespace Controllers;
use \Models\CommentModel;
use \Models\NewsModel;
use \Config\Validation;

/**
  /** \author L'HOSTIS Loriane
  /** \date 23/12/2021
  /** \file SwitchController.php
  /** \namespace Controllers
*/

class SwitchController {

   /** 
    * Constructor of the Comment controller
    */
  function __construct(array &$tErrors, string $action) {
    global $rep,$tViews;

    try{

      switch($action) {
        case "switch_article":
           $this->switch_article($tErrors);
        break;

        case "switch_home":
          $this->switch_home($tErrors);
        break;

        case "switch_sign_in":
          $this->switch_sign_in($tErrors);
        break;

        case "switch_sign_out":
          $this->switch_sign_out($tErrors);
        break;

        default:
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

   /** This function switch the current view in order to reach the article view 
    * \param[in, out] tErrors Array of errors
    */
  function switch_article(array &$tErrors) {
    global $rep,$tViews, $tDirectory;
    
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
    if ($id=='NULL') {
      require ($rep.$tViews['error']);
    }
    else {
      $model_news = new NewsModel();
      $news = $model_news->findById($id);

      require ($rep.$tViews['article']);
    }
  }

  /** This function switch the current view in order to reach the main view 
    * \param[in, out] tErrors Array of errors
    */
    function switch_home(array &$tErrors) {
      global $rep,$tViews, $tDirectory;
      require ($rep.$tViews['home']);
    }

    /** This function switch the current view in order to reach the sign in view 
    * \param[in, out] tErrors Array of errors
    */
  function switch_sign_in(array &$tErrors) {
    global $rep,$tViews, $tDirectory;

    require ($rep.$tViews['sign_in']);
  }

  /** This function switch the current view in order to reach the sign out view 
    * \param[in, out] tErrors Array of errors
    */
    function switch_sign_out(array &$tErrors) {
      global $rep,$tViews, $tDirectory;
  
      require ($rep.$tViews['sign_out']);
    }
}
?>

