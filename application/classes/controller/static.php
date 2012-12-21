<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Static extends Controllermain {
	public $template="main";
	public function action_index()
	{
		$news=ORM::factory('article')->find_all();
		$this->template->title="Новости";
		$this->template->add=View::factory('news.small')->set(array('articles' => $news));
	}
	public function action_view($url)
	{
		$page=ORM::factory('page', array('url'=>$url));
		if(!$page->loaded()) Request::initial()->redirect('');
		$this->template->title=$page->title;
		$this->template->add=View::factory('static')->set(array('page' => $page));
	}

} // End Welcome
