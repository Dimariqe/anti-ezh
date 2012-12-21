<?php defined('SYSPATH') or die('No direct script access.');

class Model_Comm extends Kohana_ORM_MPTT {
    protected $_sorting = array(
        'date' => 'DESC'
    );

}
