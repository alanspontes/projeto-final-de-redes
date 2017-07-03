<?php

class ContatoController extends \HXPHP\System\Controller
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
      
        $this->view->setTitle('CONTATO');
	}

    public function enviarAction(){

        $this->view->setFile('index');

        $this->request->setCustomFilters(array(
            'email' => FILTER_VALIDATE_EMAIL
        ));

        $post = $this->request->post();

        $enviarcontact = Register::enviar($post);
        
        $this->view->setFile('enviado');
    }
}