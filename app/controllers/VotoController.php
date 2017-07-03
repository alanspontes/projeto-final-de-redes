<?php
class VotoController extends \HXPHP\System\Controller
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

        $this->view->setTitle('PROFESSOR')
                    ->setVar('user', User::find($user_id));
	}
	
	public function votacaoAction()
    {   
        $this->view->setFile('votacao');
    }
    public function votacao2Action()
    {   
        $this->view->setFile('votacao2');
    }
    public function votacao3Action()
    {   
        $this->view->setFile('votacao3');
    }

	public function votarAction()
	{
		$post =  $this->request->post();

		$user_id = array (
			'user_id' =>$this->auth->getUserId()
		);
		$votacao = null;

		$votacao = Vote::votar($user_id, $post);

		if($votacao->status == false){
			$this->view->setFile('error');
		}else
		{
			$this->view->setFile('success');
		}
	}
	public function carAction()
	{
		$post =  $this->request->post();

		$user_id = array (
			'user_id' =>$this->auth->getUserId()
		);
		$votacao2 = null;

		$votacao2 = Car::votar($user_id, $post);

		if($votacao2->status == false){
			$this->view->setFile('error');
		}else
		{
			$this->view->setFile('success');
		}
	}
	public function planetAction()
	{
		$post = $this->request->post();

		$user_id = array (
			'user_id' =>$this->auth->getUserId()
		);

		$votacao3 = null;

		$votacao3 = Planet::votar($user_id, $post);

		if($votacao3->status == false){
			$this->view->setFile('error');
		}else
		{
			$this->view->setFile('success');
		}
	}
}