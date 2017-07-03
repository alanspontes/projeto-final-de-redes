<?php
class MediaController extends \HXPHP\System\Controller
{
	public function __construct($configs)
    {
        parent::__construct($configs);

        $this->load('Services\Auth',
            $this->configs->auth->after_login,
            $this->configs->auth->after_logout,
            true,
            $this->request->subfolder
        );

        $this->auth->redirectCheck();

        $this->load(
            'Helpers\Menu',
            $this->request,
            $this->configs,
            $this->auth->getUserRole()
        );

        $user_id = $this->auth->getUserId();

        $this->view->setTitle('NOTAS')
                    ->setVars([
                    	'user' => User::find($user_id),
                    	'notas1'=> Vote::find('all',array('select' => 'avg(fb) as fb')),
                    	'notas2'=> Car::find('all',array('select' => 'avg(fb) as fb')),
                    	'notas3'=> Planet::find('all',array('select' => 'avg(fb) as fb')),
                        'qtd1'=> Vote::find('all',array('select' => 'count(fb) as qtd')),
                        'qtd2'=> Car::find('all',array('select' => 'count(fb) as qtd')),
                        'qtd3'=> Planet::find('all',array('select' => 'count(fb) as qtd'))
            ]);
	}
}

