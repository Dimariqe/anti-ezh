<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Index extends Controlleradmin {
	public $template="main";
	public function action_index()
	{
		$this->template->title="Администраторская";
		$this->template->add=View::factory('admin/index');
	}
}