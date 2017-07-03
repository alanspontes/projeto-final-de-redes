<?php 
$cabecalho = ('Login---');
class LoginController extends \HXPHP\System\Controller
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
         $this->view->setTitle('LOGIN');
    }
    public function indexAction()
    {
    	$this->auth->redirectCheck(true);
	}


	public function logarAction()
	{
		$this->auth->redirectCheck(true);

		$this->view->setFile('index');

		$post = $this->request->post();

		if(!empty($post))
		{
			$login = User::login($post); 

			if ($login->status === true) {
				$this->auth->login($login->user->id, $login->user->username, $login->user->role->role);
			}
			else
			{
				$this->load('Modules\Messages', 'auth');
				$this->messages->setBlock('alerts');
				
				$error = $this->messages->getByCode($login->code,array(
					'message' => $login->tentativas_restantes
				));

				$this->load('Helpers\Alert', $error);
			}
		}
	}
	public function sairAction(){
		return $this->auth->logout();
	}
}
