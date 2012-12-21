<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Articles extends Controlleradmin {
	public $template="main";
	public function action_index()
	{
		$news=ORM::factory('article')->find_all();
		$this->template->title="Управление новостями";
		$this->template->add=View::factory('admin/articles.view')->set(array('articles' => $news));
	}
	public function action_edit($mod)
	{
		if(isset($_POST['article'])){
			$news=ORM::factory('article', $mod);
			if($news->loaded()){
				$news->title=$_POST['title'];
				$news->url=$_POST['slug'];
				$news->article=$_POST['article'];
				$news->save();
				Request::initial()->redirect('/admin/articles');
			}
		}
		$news=ORM::factory('article', $mod);
		$this->template->title="Управление новостями";
		$this->template->add=View::factory('admin/articles.set')->set(array('article' => $news));
	}
	public function action_delete($mod)
	{
		$news=ORM::factory('article', $mod)->delete();
		Request::initial()->redirect('/admin/articles');
	}
	public function action_add()
	{
		if(isset($_POST['article'])){
			$news=ORM::factory('article');
			$news->title=$_POST['title'];
			$news->url=$_POST['slug'];
			$news->article=$_POST['article'];
			$news->autor=$this->user->username;
			$news->save();
			Request::initial()->redirect('/admin/articles');
		}
		$this->template->title="Управление новостями";
		$this->template->add=View::factory('admin/articles.set');
	}

} // End Welcome
