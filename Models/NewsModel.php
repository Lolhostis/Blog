<?php
namespace Models;

use \Config\Connection;

use \Gateways\PictureGateway;
use \Gateways\UserGateway;
use \Gateways\NewsGateway;

use \Jobs\User;
use \Jobs\Picture;
use \Jobs\News;


/*
require_once('../Jobs/User.php');
require_once('../Jobs/Picture.php');
require_once('../Jobs/Comment.php');
require_once('../Gateways/UserGateway.php');
require_once('../Gateways/PictureGateway.php');
require_once('../Gateways/CommentGateway.php');
require_once('../Gateways/NewsGateway.php');
*/

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file NewsModel.php
  /** \namespace Models
*/

/** \class model class of comments NewsModel.php
*/
class NewsModel {
	private $news_gw;
	private $user_gw;
	private $picture_gw;

	private $con;
	private $user='root';
	private $pass='';
	private $dsn='mysql:host=localhost;dbname=dbsynapse';

	public function __construct() {
		$this->con=new Connection($this->dsn, $this->user, $this->pass);

		$this->news_gw = new NewsGateway($this->con);
		$this->user_gw = new UserGateway($this->con);
		$this->picture_gw = new PictureGateway($this->con);
	}

	/**
	 * Find a news with its ID
	 * @param  int    $id Id of the news to find
	 * @return [News]     News to find
	 */
	function findById(int $id):News {
		$raw_news = $this->news_gw->getFullNewsById($id);
		if( empty($raw_news) ) {
			//Error, no comment matching this id
			throw new \Exception("No news matching this id");
		}
		if( count($raw_news) != 1) {
			//Error, multiple comments matching this id
			throw new \Exception("Multiple news matching this id");
		}
		$raw_news = $raw_news[0];
		
		//Instantiating the picture from raw data
		$picture_user = new Picture($raw_news['id_picture'], $raw_news['uri'], $raw_news['alt']);

		//Instantiating the user from raw data
		if($raw_news['is_admin'] == 1) {
			//Case 1 : the user is an admin
			$user = new User($raw_news['login_user'], $raw_news['password'], $picture_user, true, $raw_news['email']);
		}
		else {
			//Case 2 : the user is not an admin
			$user = new User($raw_news['login_user'], $raw_news['password'], $picture_user, false, $raw_news['email']);
		}
  
  		// public function __construct(int $id, string $description, string $date, string $title, User $author, array $pictures=array(), array $commentList=array())

		$raw_news_pictures = $this->news_gw->getFullPicturesById($id);
		$news_pictures = [];
		foreach ($raw_news_pictures as $value) {
			$news_pictures[] = $value['id_picture'];
		}

		$raw_news_comments = $this->news_gw->getFullCommentsById($id);
		$news_comments = [];
		foreach ($raw_news_comments as $value) {
			$news_comments[] = $value['id_comment'];
		}

		//Instantiating the news from raw data
		$news = new News($raw_news['id'], $raw_news['description'], $raw_news['date'], $raw_news['title'], $user, $news_pictures, $news_comments);

		return $news;
	}
	
	/**
	 * Add a new news
	 * @param int    $id          Id of the news to add
	 * @param string $title       Title of the news to add
	 * @param string $description Description of the news to add
	 * @param string $date        Date of the news to add
	 * @param string $login_user  Login of the author who wants to add the news
   * @return [bool]    true if it's right ; false if there is a problem
	 */
	function addNews(int $id, string $title, string $description, string $date, string $login_user):bool {

		if( !empty($this->news_gw->getNewsById($id)) ) {
			throw new \Exception("the news ID already exists");
		}
		if( empty($this->user_gw->FindByName($login_user)) ) {
			throw new \Exception("Unknown user login");
		}

		return $this->news_gw->insert_raw_news($id, $title, $description, $date, $login_user);
	}

	/**
	 * Delete a news
	 * @param int $id   Id of the news to remove
     * @return [bool]   true if it's right ; false if there is a problem
	 */
	function deleteNews(int $id):bool {
		
		if( empty($this->news_gw->getNewsById($id)) ) {
			throw new \Exception("the news ID doesn't exist");
		}

		if( empty($this->user_gw->FindByName($login_user)) ) {
			throw new \Exception("Unknown user login");
		}

		return $this->news_gw->delete_news($id);
	}
}
?> 
