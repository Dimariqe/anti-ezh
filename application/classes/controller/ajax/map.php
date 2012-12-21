<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax_Map extends Controller {

	public function action_index()
	{
		Request::initial()->redirect('');
	}
	
	public function action_admin($mod=NULL)
	{
		$auth = Auth::instance();
		if($auth->logged_in('admin'))
			switch($mod){
				case "update":
					if($_POST["id"]=="")
						$_POST["id"]=uniqid();
					echo json_encode(array("id" => $_POST["id"]));
					$maps=ORM::factory('map', array('id'=>$_POST["id"]));
					$maps->id=$_POST["id"];
					$maps->title=$_POST["name"];
					$maps->desc=nl2br($_POST["desc"]);
					$maps->x=$_POST["x"];
					$maps->y=$_POST["y"];
					$maps->zoom=$_POST["zoom"];
					$maps->save();
				break;
				case "delete":
					ORM::factory('map', array('id'=>$_POST["id"]))->delete();
				break;
			}
		else Request::initial()->redirect('');
	}
	public function action_jspoints(){
		$data=null;
		$data['points']=ORM::factory('map')->find_all();
		$auth = Auth::instance();
		if($auth->logged_in('admin'))
			$view = View::factory('ajax/map.js.points.admin')->set($data);
		else
			$view = View::factory('ajax/map.js.points')->set($data);
		$this->response->body($view);
	}

}
