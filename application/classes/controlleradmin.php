<?php defined('SYSPATH') or die('No direct script access.');

class Controlleradmin extends Controller_Template {
    protected $auth;
    protected $user;
	public function before()	
	{
		$this->auth = Auth::instance();				
		$this->user = $this->auth->get_user();
		if(!$this->auth->logged_in('admin')) Request::initial()->redirect('');
		return parent::before();
	}
	public function after()	
	{
		parent::after();
		if($this->auto_render){
			$this->template->login=true;
			$this->template->admin=true;
		}
		return parent::after();
	}
}
