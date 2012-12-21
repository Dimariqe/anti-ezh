<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Static extends Controlleradmin {
	public $template="main";
	public function action_index()
	{
		$page=ORM::factory('page')->find_all();
		$this->template->title="Управление страницами";
		$this->template->add=View::factory('admin/page.view')->set(array('pages' => $page));
	}
	public function action_edit($mod)
	{
		if(isset($_POST['article'])){
			$page=ORM::factory('page', $mod);
			if($page->loaded()){
				$page->title=$_POST['title'];
				$page->url=$_POST['slug'];
				$page->content=$_POST['article'];
				$page->save();
				Request::initial()->redirect('/admin/static');
			}
		}
		$page=ORM::factory('page', $mod);
		$this->template->title="Управление страницами";
		$this->template->add=View::factory('admin/page.set')->set(array('page' => $page));
	}
	public function action_delete($mod)
	{
		$page=ORM::factory('page', $mod)->delete();
		Request::initial()->redirect('/admin/static');
	}
	public function action_add()
	{
		if(isset($_POST['article'])){
			$page=ORM::factory('page');
			$page->title=$_POST['title'];
			$page->url=$_POST['slug'];
			$page->content=$_POST['article'];
			$page->save();
			Request::initial()->redirect('/admin/static');
		}
		$this->template->title="Управление новостями";
		$this->template->add=View::factory('admin/page.set');
	}

} // End Welcome
