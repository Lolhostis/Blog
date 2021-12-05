<?php
namespace Tests;

/**
  /** \author L'HOSTIS Loriane
  /** \date 05/12/2021
  /** \file NewsController.php
  /** \namespace Tests
*/


/** \class Controller of the news NewsController.php
*/
class NewsController {

   /** Constructor of the News controller
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

        case "get_news":
          $this->get_news($tErrors);
        break;

        case "add_news":
          $this->add_news($tErrors);
        break;

        case "delete_news":
          $this->delete_news($tErrors);
        break;

        default:
          $tErrors[] = "No php view";
          require ($rep.$tViews['view_test_news']);
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

    $row_news = array ();
    require ($rep.$tViews['view_test_news']);
  }

   /** This function return informations about a news from the database
    * \param[in, out] tErrors Array of errors
    */
  function get_news(array $tErrors) {
    global $rep,$tViews;

    $id_news=$_POST['id_news'];
    \Config\Validation::val_form_news_consult($id_news, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'

    $model_news = new \Models\NewsModel();

    $data=$model_news->findById($id_news); //if there is an exception, it is catched by the case exception in the 'case try'

    $row_news = array (
      'res_id_news' => $id_news,
      'res_title_news' => $data->getTitle(),
      'res_description_news' => $data->getDescription(),
      'res_date_news' => $data->getDate(),
      'res_login_user_news' => $data->getAuthor()->getLogin(),
    );
    require ($rep.$tViews['view_test_news']);
  }

   /** This function add a news into the database
    * \param[in, out] tErrors Array of errors
    */
  function add_news(array $tErrors) {
    global $rep,$tViews;

    $id_news=$_POST['id_news'];
    $title_news=$_POST['title_news'];
    $description_news=$_POST['description_news'];
    $date_news=$_POST['date_news'];
    $login_user_news=$_POST['login_user_news'];
    \Config\Validation::val_form_news_add($id_news, $title_news, $description_news, $date_news, $login_user_news, $tErrors);

    $model_news = new \Models\NewsModel();

    $result_insert=$model_news-> addNews($id_news, $title_news, $description_news, $date_news, $login_user_news);

    if($result_insert==true){
      $notification="News added";
    }else{
     // tErrors[]="Can't add this user";
      //error view
    }

    require ($rep.$tViews['view_test_news']);
  }
}
?>
















































/*
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Models/NewsModel.php');
    require_once('../Config/Connexion.php');
    require_once('../Config/Validation.php');

    if( isset($_POST['action']) ) {
        $errors = "";
        $nmodel = new NewsModel();

        if( $_POST['action']=="Get news" ) {
            $news="";
            Validation::val_form_news_consult($_POST['id_news'], $errors);
            if( !empty($errors) ) {
                echo "NO VALID FORM !</br>".$errors."</br>";
            }
            try {
                $news = $nmodel->findById($_POST['id_news']);
            }
            catch (Exception $exception) {
                echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
            }

            if( $news!="" ) {
                echo "Resulting News : ".$news->toString()."</br>";
            }
        }

        if( $_POST['action']=="Add news" ) {

            Validation::val_form_news_add($_POST['id_news'], $_POST['title'], $_POST['description'], $_POST['date'], $_POST['login_user'],$errors);
            if( !empty($errors) ) {
                echo "NO VALID FORM !</br>".$errors."</br>";
            }
            else {
                try {
                    if( $nmodel->addNews($_POST['id_news'], $_POST['title'], $_POST['description'], $_POST['date'], $_POST['login_user']) ) {
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
