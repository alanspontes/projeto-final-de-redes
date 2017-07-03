<?php 

class PerfilController extends \HXPHP\System\Controller
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

        $this->view->setTitle('PERFIL')
                    ->setVar('user', User::find($user_id));
    }
    public function editarAction()
    {
        $this->view->setFile('editar');

        $user_id = $this->auth->getUserId();

        $this->request->setCustomFilters(array(
            'email' => FILTER_VALIDATE_EMAIL
        ));

        $post = $this->request->post();

        if (!empty($post)){
            $atualizarUsuario = User::atualizar($user_id, $post);

            if($atualizarUsuario->status === false){
                $this->load('Helpers\Alert',array(
                    'danger',
                    'Ops! Não foi possível atualizar seu perfil. Verifique os erros abaixo:',
                    $atualizarUsuario->errors
                ));
            }
            else{
                $this->view->setVar('user', $atualizarUsuario->user);
                $this->load('Helpers\Alert',array(
                    
                    'sucess',
                    'Perfil atualizado com sucesso.'
                ));
            }
        }
    }
}
