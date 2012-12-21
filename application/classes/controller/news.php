<?php defined('SYSPATH') or die('No direct script access.');

class Controller_News extends Controllermain {
	public $template="main";
	public function action_index()
	{
		$news=ORM::factory('article')->find_all();
		$this->template->title="Новости";
		$this->template->add='';
		foreach($news as $article){
			$comments=ORM::factory('comm')->where('article_id', '=', $article->id)->count_all();
			$this->template->add.=View::factory('news.small')->set(array('article' => $article, 'newscount' => $comments));
		}
	}
	public function action_view($id, $url)
	{
		$recaptcha=new Recaptcha;
		$news=ORM::factory('article', $id);
		if(!$news->loaded() or $news->url!=$url) Request::initial()->redirect('news');
		$this->template->title=$news->title;
		$this->template->add=View::factory('news.full')->set(array('article' => $news));
		$comments=ORM::factory('comm')->where('article_id', '=', $id)->find_all();
		if(count($comments)>0)
			$this->template->add.=View::factory('comments.view')->set(array('comments' => $comments, 'login' => $this->auth->logged_in(''), 'admin' => $this->auth->logged_in('admin')));
		else
			$this->template->add.=View::factory('comments.nocomments');
		$this->template->add.=View::factory('comments.post')->set(array('recaptcha' => $recaptcha->get_html(), 'id' => $id, 'login' => $this->auth->logged_in('')));
	}

} // End Welcome
