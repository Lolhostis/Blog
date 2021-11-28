<?php
    require_once('../Config/Validation.php');
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Models/UserModel.php');
    require_once('../Config/Connexion.php');
	require_once('../Config/Validation.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Testing UserModel</title>
    </head>
    <body>
        <form method="POST" action="test_UserModel.php">
		   <h1>Consult User</h1>
            <p>Login of the user : <input type="TEXT" name="login_user" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get user"/></p>
        </form>
		<form method="POST" action="test_UserModel.php">
		   <h1>Add User</h1>
           <p>Login : <input type="TEXT" name="login_user" value=""/></p>
		   <p>Password : <input type="PASSWORD" name="password" value=""/></p>
		   <p>Email : <input type="EMAIL" name="email" value=""/></p>
		   <p>
		   	Is an admin :</br>
		   	<label><input type="RADIO" name="isadmin" value=1/>Yes</label>
		   	<label><input type="RADIO" name="isadmin" value=0 checked/>No</label>
		   </p>
		   <p>Id of the profile picture : <input type="TEXT" name="id_picture" value=""/></p>
           <p><input type="SUBMIT" name="action" value="Add user"/></p>
        </form>


        <?php 
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
        ?>
    </body>
</html>
