<?php

class Validation {

	static function val_action($action) {
		if (!isset($action)) {
		throw new Exception('No action');
		// This is equivalent to:
		//$action =  if (isset($_GET['action'])) $action=$_GET['action']  else $action='no';
		//or to :
		//$action = $_GET['action'] ?? 'no';
		}
	}
	
	 static function val_form_comment_consult(string &$id, string &$errors) {
        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id</br>";
            $id="";
		}
	 }

    static function val_form_comment_add(string &$id, string &$text, string &$date, string &$login_user, string &$id_news,string &$errors) {
        if (!isset($id)||$id==""||!filter_var($id, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id</br>";
            $id="";
        }

    	if (!isset($text)||$text=="") {
            $errors = $errors."No valid text</br>";
            $text="";
        }
    	else {
    		$text = filter_var($text, FILTER_SANITIZE_STRING);
    	}

        if (!isset($date)||$date=="") {
            $errors = $errors."No valid date</br>";
            $date="";
        }
    	else {
    		$date = filter_var($date, FILTER_SANITIZE_STRING);
    	}

    	if (!isset($login_user)||$login_user=="") {
            $errors = $errors."No valid login</br>";
            $login_user="";
        }
    	else {
    		$login_user = filter_var($login_user, FILTER_SANITIZE_STRING);
    	}

    	if (!isset($id_news)||$id_news==""||!filter_var($id_news, FILTER_VALIDATE_INT)) {
            $errors = $errors."No valid id_news</br>";
            $id_news="";
        }
    }

}
?>

        
