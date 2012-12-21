<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax_Comment extends Controllerajax {
	public function action_index()
	{
		Request::initial()->redirect('');
	}
	
	public function action_add($mod=NULL)
	{
		if($_POST['text']!="" && $mod && ((isset($_POST['autor']) && $_POST['autor']!="") || $this->auth->logged_in())){
			$recaptcha=new Recaptcha;
			$comment=ORM::factory('comm');
			$comment->autor=($this->auth->logged_in())?$this->user->username:strip_tags($_POST['autor']);
			$comment->comment=strip_tags($_POST['text'], '<b><i><u><strike><div>');
			$comment->super=($this->auth->logged_in('admin'))?1:0;
			$comment->article_id=(int)$mod;
			$commentroot=ORM::factory('comm', (int)$_POST['poctrepl']);
			if(1) {
				if($_POST['poctrepl']=="null") $comment->save();
				else 
				$comment->insert_as_last_child($commentroot);
				echo json_encode(array('ok' => 1));
			} else echo json_encode(array('ok' => 0, 'error' => 'Картинка написана неверно!'));
		} else echo json_encode(array('ok' => 0, 'error'=> 'Вы не заполнили все поля!'));
	}
	
	public function action_view($mod=null) {
		$comments=ORM::factory('comm')->where('article_id', '=', (int)$mod)->find_all();
		echo View::factory('comments.view')->set(array('ajax' => 1, 'comments' => $comments, 'login' => $this->auth->logged_in(), 'admin' => $this->auth->logged_in('admin')));
	}
	public function action_delete($mod=null) {
		if($this->auth->logged_in('admin')){
			$comments=ORM::factory('comm', (int) $mod);
			$comments->delete();
			Request::initial()->redirect($this->request->referrer());
		} else Request::initial()->redirect();
	}

}
