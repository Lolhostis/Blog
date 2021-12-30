<?php
namespace Controllers;
use \Models\CommentModel;
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
        case "article":
          $this->switch_article($tErrors);
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

   /** This function return informations about a comment from the database
    * \param[in, out] tErrors Array of errors
    */
  function switch_article(array &$tErrors) {
    global $rep,$tViews;

    require ($rep.$tViews['article']);
  }
}
?>

