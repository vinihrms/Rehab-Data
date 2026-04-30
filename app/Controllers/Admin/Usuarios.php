<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Usuarios extends BaseController
{
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new \App\Models\UsuarioModel();
    }

    public function index()
    {
        $data = [
            'titulo' => 'Listando os usuários',
            'usuarios' => $usuario = $this->usuarioModel->findAll()

        ];


        return view('Admin/Usuarios/index', $data);

    }

    // @uso
    // recebe string termo
    // retorna array de resultados

    public function procurar() {
        if(!$this->request->isAJAX()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();       
        }

        $usuarios = $this->usuarioModel->procurar($this->request->getGet('term'));

        $retorno = [];

        foreach($usuarios as $usuario){

            $data['id'] = $usuario->id;
            $data['value'] = $usuario->nome;

            $retorno[] = $data;

        }

        return $this->response->setJSON($retorno);

    }

    public function show($id = null) {
        $usuario = $this->buscaUsuarioOu404($id);

        $data = [
            'titulo' => "Detalhando o usuário $usuario->nome",
            'usuario' => $usuario
        ];

        return view('Admin/Usuarios/show', $data);

    }
    
    public function editar($id = null) {
        $usuario = $this->buscaUsuarioOu404($id);

        $data = [
            'titulo' => "Editando o usuário $usuario->nome",
            'usuario' => $usuario
        ];

        return view('Admin/Usuarios/editar', $data);

    }

        


    //recebe id e retorna usuario

    private function buscaUsuarioOu404(int $id = null){
        if(!$id || !$usuario = $this->usuarioModel->where('id', $id)->first()){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Não encontramos o usuário $id");
        }

        return $usuario;
    }
}
