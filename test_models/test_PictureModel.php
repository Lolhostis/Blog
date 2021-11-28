<?php
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Models/PictureModel.php');
    require_once('../Config/Connexion.php');
	require_once('../Config/Validation.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Testing PictureModel</title>
    </head>
    <body>
        <form method="POST" action="test_PictureModel.php">
		   <h1>Consult Picture</h1>
            <p>id of the picture : <input type="INT" name="id_picture" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Get picture"/></p>
        </form>
		<form method="POST" action="test_PictureModel.php">
		   <h1>Add Picture</h1>
           <p>Id : <input type="INT" name="id_picture" value=""/></p>
		   <p>Uri : <input type="TEXT" name="uri" value=""/></p>
		   <p>Alt : <input type="TEXT" name="alt" value=""/></p>
           <p><input type="SUBMIT" name="action" value="Add picture"/></p>
        </form>


        <?php 
			/* Debug
            var_dump($_POST);
            echo "</br>";
            */
            if( isset($_POST['action']) ) {
				$errors = "";
				$pmodel = new PictureModel();
				
				if( $_POST['action']=="Get picture" ) {
					$picture="";
					Validation::val_form_picture_consult($_POST['id_picture'], $errors);
					if( !empty($errors) ) {
						echo "NO VALID FORM !</br>".$errors."</br>";
					}
					try {
						$picture = $pmodel->findByID($_POST['id_picture']);
					}
					catch (Exception $exception) {
						echo $exception->getMessage().'</br>'.$exception->getLine().'</br>'.$exception->getFile() . "<br/>";
					}
					
					if( $picture!="" ) {
						echo "Resulting Picture : ".$picture->toString()."</br>";
					}
				}
				
				if( $_POST['action']=="Add picture" ) {
					
					Validation::val_form_picture_add($_POST['id_picture'], $_POST['uri'], $_POST['alt'], $errors);
					if( !empty($errors) ) {
						echo "NO VALID FORM !</br>".$errors."</br>";
					}
					else {
						try {
							if( $pmodel->addPicture($_POST['id_picture'], $_POST['uri'], $_POST['alt']) ) {
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
