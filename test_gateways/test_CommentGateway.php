<?php
    require_once('../Config/Validation.php');
    require_once('../Jobs/Comment.php');
    require_once('../Jobs/News.php');
    require_once('../Jobs/Picture.php');
    require_once('../Jobs/User.php');
    require_once('../Gateways/CommentGateway.php');
    require_once('../Config/Connexion.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Testing CommentGateway</title>
    </head>
    <body>
        <form method="POST" action="test_CommentGateway.php">
            <p>id : <input type="INT" name="id" value=""/></p>
            <p>Date : <input type="DATE" name="date" value=""/></p>
            <p>Content : <input type="TEXT" name="content" value=""/></p>
            <p>Id_news : <input type="TEXT" name="id_news" value=""/></p>
            <p>Id_picture : <input type="TEXT" name="id_picture" value=""/></p>
            <p><input type="SUBMIT" name="action" value="Create instance"/></p>
            <p><input type="SUBMIT" name="action" value="Consult BDD"/></p>
        </form>


        <?php 
			/* Debug
            var_dump($_POST);
            echo "</br>";
            */
            if( isset($_POST['id']) ) {
				$cgw = new CommentGateway();
				if( $_POST['action']=="Create instance" ) {
					$p = new Picture($_POST['id_picture']);
					$u = new User("panda_masque", "chatonchaton", $p);
					$c = new Comment($_POST['id'], $_POST['content'], $_POST['date'], "", $u);
					$n = new News("1", "news de test 1", $_POST['date'], "titre de la news 1", $u);
					$cgw->insert_comment($c, $n);
				}
				if( $_POST['action']=="Consulter BDD" ) {
					//require('consultation.php');
				}
				$_POST = [];
            }
        ?>
    </body>
</html>

