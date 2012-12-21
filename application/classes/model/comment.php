<?php defined('SYSPATH') or die('No direct script access.');

class Model_Comment extends ORM {
	protected $_sorting = array(
    'date' => 'DESC'
	);
	public function getTree($aid)
    {
        $comments = ORM::factory('comment', array('article_id'=>$aid));
		
		if($comments->loaded())
		{
			
		}
		else
		{
			return FALSE;
		}
    }
}
