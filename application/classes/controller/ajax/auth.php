<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax_Auth extends Controller {

	public function action_index()
	{
		Request::initial()->redirect('');
	}
	
	public function action_view($mod=NULL)
	{
		if(Kohana::find_file('views', 'ajax/auth.view.'.$mod)) {
			$view = View::factory('ajax/auth.view.'.$mod);
			$this->response->body($view);
		} else Request::initial()->redirect('');
	}

}
