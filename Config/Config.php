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
$tViews['view_test_main']='Tests/ViewsToTest/view_test_main.php';
$tViews['main_view']='Tests/ViewsToTest/main_view.php';

//Actions
$news_actions = array("get_news", "add_news", "delete_news");
$comment_actions = array("get_comment", "add_comment", "delete_comment");
$user_actions = array("get_user", "add_user", "delete_user");
$picture_actions = array("get_picture", "add_picture", "delete_picture");
$manage_jobs = array(
    "manage_news"=>$rep.$tViews["view_test_news"],
    "manage_comment"=>$rep.$tViews["view_test_comment"],
    "manage_user"=>$rep.$tViews["view_test_user"],
    "manage_picture"=>$rep.$tViews["view_test_picture"]
);
?>
