<?php
class IndexController extends \HXPHP\System\Controller
{
	public function __construct($configs)
    {
        parent::__construct($configs);

        $this->view->setTitle('INÍCIO');
        
	}
}