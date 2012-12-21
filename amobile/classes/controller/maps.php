<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Maps extends Controller_Template {
	public $template="main";
	public function action_index()
	{
		$this->template->title="Карта блокпостов";
		$this->template->points=ORM::factory('map')->find_all();
	}

} // End Welcome
