<?php
    require_once('../Config/Validation.php');
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Models/UserModel.php');
    require_once('../Config/Connexion.php');
  require_once('../Config/Validation.php');

  /* Debug
    var_dump($_POST);
    echo "</br>";
    */
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
            $_POST = [];
        }
    }
