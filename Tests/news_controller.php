<?php
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Models/NewsModel.php');
    require_once('../Config/Connexion.php');
    require_once('../Config/Validation.php');

    /* Debug
    var_dump($_POST);
    echo "</br>";
    */
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
