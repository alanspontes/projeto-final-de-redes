<?php
class HomeController extends \HXPHP\System\Controller
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

        $this->view->setTitle('HOME')
                    ->setVar('user', User::find($user_id));
	}

	public function bloqueadaAction()
	{
		$this->auth->roleCheck(array(
				'admin','user'
			));
	}
}

    