<?php defined('SYSPATH') or die('No direct script access.');

class Model_Article extends ORM {
	protected $_sorting = array(
    'date' => 'DESC'
	);
}
