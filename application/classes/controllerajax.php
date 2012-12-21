<?php defined('SYSPATH') or die('No direct script access.');

class Controllerajax extends Controller {
    protected $auth;
    protected $user;

	public function before()	
	{
		$this->auth = Auth::instance();				
		$this->user = $this->auth->get_user();
		return parent::before();
	}
}
