<?php
namespace Tests;
use \Models\UserModel;
use  \Config\Validation;

/**
  /** \author L'HOSTIS Loriane
  /** \date 05/12/2021
  /** \file UserController.php
  /** \namespace Tests
*/


/** \class Controller of users UserController.php
*/
class UserController {

   /** Constructor of the User controller
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

        case "get_user":
          $this->get_user($tErrors);
        break;

        case "add_user":
          $this->add_user($tErrors);
        break;

        case "delete_user":
          $this->delete_user($tErrors);
        break;

        default:
          $tErrors[] =  "No php view";
          require ($rep.$tViews['view_test_user']);
          break;
      }

    } catch (\PDOException $e){
      $tErrors[] =  "Unexpected error";
       require ($rep.$tViews['error']);
    }catch (\Exception $e2){
      $tErrors[] =  "Unexpected error";
      require ($rep.$tViews['error']);
    }

    exit(0);
  }

 /** This function loads the page
  */
  function Reinit() {
  global $rep,$tViews;

    $row_user = array ();
    require ($rep.$tViews['view_test_user']);
  }

   /** This function return informations about a user from the database
    * \param[in, out] tErrors Array of errors
    */
  function get_user(array $tErrors) {
    global $rep,$tViews;

    $login_user=$_POST['login_user'];
    Validation::val_form_user_consult($login_user, $tErrors); //if there is an exception, it is catched by the case exception in the 'case try'

    $model_user = new UserModel();

    $data=$model_user->findByLogin($login_user); //if there is an exception, it is catched by the case exception in the 'case try'

    $row_user = array (
      'res_login_user' => $login_user,
      'res_password_user' => $data->getPassword(),
      'res_email_user' => $data->getEmail(),
      'res_isadmin_user' => $data->getIsAdmin(),
      'res_id_picture_user' => $data->getPicture()->getId(),
    );
    require ($rep.$tViews['view_test_user']);
  }

   /** This function add a user into the database
    * \param[in, out] tErrors Array of errors
    */
  function add_user(array $tErrors) {
    global $rep,$tViews;

    $login_user=$_POST['login_user'];
    $password_user=$_POST['password_user'];
    $email_user=$_POST['email_user'];
    $isadmin_user=$_POST['isadmin_user'];
    $id_picture_user=$_POST['id_picture_user'];
    $isadmin_user = $_POST['isadmin_user'];
    Validation::val_form_user_add($login_user, $password_user, $email_user, $id_picture_user, $tErrors);

    $model_user = new UserModel();

    $result_insert=$model_user->addUser($login_user, $password_user, $email_user, $isadmin_user, $id_picture_user);

    if($result_insert==true){
      $notification="User added";
    }else{
     // tErrors[]="Can't add this user";
      //error view
    }

    require ($rep.$tViews['view_test_user']);
  }
}
?>


















  /*

    if( isset($_POST['action']) ) {
        $errors = "";
        $umodel = new UserModel();

        if( $_POST['action']=="Get user" ) {
            $user="";
            Validation::val_form_user_consult($_POST['login_user'], $errors);
            if( !empty($errors) ) {
                echo "NO VALID FORM !</br>".$errors."</br>";
            }
            try {
                $user = $umodel->findByLogin($_POST['login_user']);
            }
            catch (Exception $exception) {
                echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
            }

            if( $user!="" ) {
                echo "Resulting User : ".$user->toString()."</br>";
            }
        }

        if( $_POST['action']=="Add user" ) {

            Validation::val_form_user_add($_POST['login_user'], $_POST['password'], $_POST['email'], $_POST['id_picture'], $errors);
            if( !empty($errors) ) {
                echo "NO VALID FORM !</br>".$errors."</br>";
            }
            else {
                try {
                    if( $umodel->addUser($_POST['login_user'], $_POST['password'], $_POST['email'], $_POST['isadmin'], $_POST['id_picture']) ) {
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
           // $_POST = [];
        }
    }
?>


*/
