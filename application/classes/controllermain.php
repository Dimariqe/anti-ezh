<?php defined('SYSPATH') or die('No direct script access.');

class Controllermain extends Controller_Template {
    protected $auth;
    protected $user;

	public function before()	
	{
		$this->auth = Auth::instance();				
		$this->user = $this->auth->get_user();
		return parent::before();
	}
	public function after()	
	{
		parent::after();
		if($this->auto_render){
			$auth = Auth::instance();
			if($auth->logged_in())  $this->template->login=true;
			if($auth->logged_in('admin')) $this->template->admin=true;
		}
		return parent::after();
	}
}
