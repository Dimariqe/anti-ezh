<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Map extends Controllermain {
	public $template="main";
	public function action_index()
	{
		$this->template->title="Карта блокпостов";
		$this->template->points=true;
		$auth = Auth::instance();
		if($auth->logged_in('admin')) $this->template->add=View::factory('map.admin');
		else $this->template->add=View::factory('map');
	}

} // End Welcome
