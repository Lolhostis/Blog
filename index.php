<?php
    require('Jobs/Comment.php');
    require('Gateway/CommentGateway.php');
    require('Config/Connexion.php');
    require('Config/Validation.php')
?>
<!DOCTYPE html>
<html>
<head>
    <title>Creation of an instance of Comment</title>
</head>
<body>
<form method="POST" action="index.php">
    <p>id : <input type="TEXT" name="ref" value=""/></p>
    <p>date : <input type="TEXT" name="titre" value=""/></p>
    <p>content : <input type="TEXT" name="date" value=""/></p>
    <p><input type="SUBMIT" name="validate" value="Create instance"/></p>
</form>

<?php
    /* Debug
    var_dump($_POST);
    echo "</br>";
    */
    if( isset($_POST['id']) ) {
        $commentgw = new CommentGateway();
        if( $_POST['validate']=="Create instance" ) {
            $_POST['id'] = Validation::cleanString($_POST['id']);
            $_POST['date'] = Validation::cleanString($_POST['date']);
            $_POST['content'] = Validation::cleanString($_POST['content']);

            if( !empty($_POST['id']) && !empty($_POST['date']) && !empty($_POST['content']) ) {
                $c1 = new Comment();
            }
        }
        $_POST = [];
    }
?>
</body>
</html>

