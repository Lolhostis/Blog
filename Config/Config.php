<?php

//gen
$rep=__DIR__."\..\\";

// liste of modules

//$dConfig['includes']= array('controleur' . DIRECTORY_SEPARATOR . 'Validation.php');

//Database 

$base="mysql:host=localhost;dbname=dbsynapse";
$login='root';
$mdp='';

//Views

$tViews['article']='Views' . DIRECTORY_SEPARATOR . 'article.php';
$tViews['error']='Views' . DIRECTORY_SEPARATOR . 'error.php';
$tViews['footer']='Views' . DIRECTORY_SEPARATOR . 'footer.php';
$tViews['head']='Views' . DIRECTORY_SEPARATOR . 'head.php';
$tViews['home']='Views' . DIRECTORY_SEPARATOR . 'home.php';
$tViews['menu']='Views' . DIRECTORY_SEPARATOR . 'menu.php';
$tViews['sign_in']='Views' . DIRECTORY_SEPARATOR . 'sign_in.php';
$tViews['sign_up']='Views' . DIRECTORY_SEPARATOR . 'sign_up.php';
$tViews['search']='Views' . DIRECTORY_SEPARATOR . 'search.php';

$tViews['bootstrapMinJs']='Views' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'bootstrap.bundle.min.js';
$tViews['bootstrapMinCcs']='Views' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'bootstrap.min.css';
$tViews['cssSignin']='Views' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'css' . DIRECTORY_SEPARATOR . 'Vignin.css';
//$tViews['jquerry']='query-1.11.2.min.js'; 
$tViews['jquerry']= 'Views' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR .  'jquery-3.4.1.slim.min.js';

$tViews['view_test_comment']='Tests' . DIRECTORY_SEPARATOR . 'ViewsToTest' . DIRECTORY_SEPARATOR . 'view_test_comment.php';
$tViews['view_test_news']='Tests' . DIRECTORY_SEPARATOR . 'ViewsToTest' . DIRECTORY_SEPARATOR . 'view_test_news.php';
$tViews['view_test_picture']='Tests' . DIRECTORY_SEPARATOR . 'ViewsToTest' . DIRECTORY_SEPARATOR . 'view_test_picture.php';
$tViews['view_test_user']='Tests' . DIRECTORY_SEPARATOR . 'ViewsToTest' . DIRECTORY_SEPARATOR . 'view_test_user.php';
$tViews['view_test_main']='Tests' . DIRECTORY_SEPARATOR . 'ViewsToTest' . DIRECTORY_SEPARATOR . 'view_test_main.php';
$tViews['main_view']='Tests' . DIRECTORY_SEPARATOR . 'ViewsToTest\main_view.php';

$tViews['pictures']='Views' . DIRECTORY_SEPARATOR . 'Resources' . DIRECTORY_SEPARATOR . 'Pictures' . DIRECTORY_SEPARATOR;

// Directory
$tDirectory['user_pictures']='Assets' . DIRECTORY_SEPARATOR . 'Pictures' . DIRECTORY_SEPARATOR . 'Users' . DIRECTORY_SEPARATOR;
$tDirectory['news_pictures']='Assets' . DIRECTORY_SEPARATOR . 'Pictures' . DIRECTORY_SEPARATOR . 'News' . DIRECTORY_SEPARATOR;

//Actions
$news_actions = array('get_news', 'add_news', 'delete_news', 'search_news');
$comment_actions = array('get_comment', 'add_comment', 'delete_comment');
$user_actions = array('get_user', 'add_user', 'delete_user');
$picture_actions = array('get_picture', 'add_picture', 'delete_picture');
$views_actions = array('switch_article', 'switch_home', 'switch_sign_in', 'switch_sign_up');
$manage_jobs = array(
    'manage_news'=>$rep.$tViews['view_test_news'],
    'manage_comment'=>$rep.$tViews['view_test_comment'],
    'manage_user'=>$rep.$tViews['view_test_user'],
    'manage_picture'=>$rep.$tViews['view_test_picture']
);

//Var
$nbNewsPerPage = -1;

?>
