<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controllermain {

	public $template = 'main';
	
	public function action_index()
	{
		$auth = Auth::instance();
		$data = array();
		
		if($auth->logged_in())
			Request::initial()->redirect('');
		else
			if(isset($_POST['login']) && isset($_POST['password']))
			{
				$login = Arr::get($_POST, 'login', '');
				$password = Arr::get($_POST, 'password', '');
				if($auth->login($login, $password))
				{			
					$session = Session::instance();
					$auth_redirect = $session->get('auth_redirect', '');
					$session->delete('auth_redirect');
					Request::initial()->redirect($auth_redirect);
				}
				else
					$data["error"] = "";
			}
			
		
		$this->template->add=View::factory('auth.view', $data);
	}
	public function action_login()
	{
		if(isset($_POST)){
			$auth = Auth::instance();
			$login = Arr::get($_POST, 'login', '');
			$password = Arr::get($_POST, 'password', '');
			if($auth->login($login, $password) == 0) {
				$this->template->title="Ошибка авторизации";
				$this->template->add=View::factory('error')->set(array('title' => $this->template->title, 'error' => 'Такой пользователь у нас не найден. Проверьте правильность введеных логина и пароля!'.$login." ".$password));
				return;
			}
			
		}
		Request::initial()->redirect('');
	}
	
	public function action_reg()
	{
		$data = array();
		
		if(isset($_POST))
		{
			$email = Arr::get($_POST, 'email', '');
			$username = Arr::get($_POST, 'username', '');
			$register = new Model_Register();
			if($register->reg($email, $regcodevalue, 1))
			{				
				$data["regok"] = "";
			}
			else
			{
				$data["errors"] = $register->errors;
			}		
		}
		
		$this->template->content =  View::factory('regview', $data);
	}
	
	public function action_hpass()
	{
		$auth = Auth::instance();
		$this->template->title="ss";
		$this->template->add = $auth->hash_password('0p3nn3t');
	}
	
	public function action_logout()
	{
		$auth = Auth::instance();
		$auth->logout();
		Request::initial()->redirect('');
	}

        public function action_hochuvspomnit()
	{
            $data = array();

            if(isset($_POST['btnsubmit']))
            {

                $email = Arr::get($_POST, 'email', '');

                $register = new Model_Register();

                if($register->hochuNoviyParol($email))
                {
                    $data["ok"] = "";
                }
                else
                {
                    $data["error"] = "";
                }
            }
            $this->template->content =  View::factory('rempassview', $data);
        }

        public function action_checkcode($code)
         {
            $data = array();

            $register = new Model_Register();

            if($register->obnovlenieparolia($code))
            {
                $data["ok"] = "";
            }
            else
            {
                $data["error"] = "";
            }
             $this->template->content =  View::factory('checkcodeview', $data);
         }

} // End Welcome
