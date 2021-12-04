<?php

//gen
$rep=__DIR__.'/../';

// liste of modules

//$dConfig['includes']= array('controleur/Validation.php');

//BD

$base="mysql:host=localhost;dbname=dbsynapse";
$login="root";
$mdp="";

//Vues

$tViews['article']='Views/article.php';
$tViews['error']='Views/error.php';
$tViews['footer']='Views/footer.php';
$tViews['head']='Views/head.php';
$tViews['home']='Views/home.php';
$tViews['menu']='Views/menu.php';
$tViews['sign_in']='Views/sign_in.php';
$tViews['sign_up']='Views/sign_up.php';

$tViews['view_test_comment']='Tests/ViewsToTest/view_test_comment.php';
$tViews['view_test_news']='Tests/ViewsToTest/view_test_news.php';
$tViews['view_test_picture']='Tests/ViewsToTest/view_test_picture.php';
$tViews['view_test_user']='Tests/ViewsToTest/view_test_user.php';

?>
