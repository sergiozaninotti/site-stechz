<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{

		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('user_model', 'user');
		$this->load->library('form_validation');
		date_default_timezone_set('America/Sao_Paulo');
	}

	public function index()
	{

        if ($this->session->userdata("user_id")) { // verifica se existe alguma sessão iniciada pelo login e redireciona
			$data = array(
				'page_title' => "Dashboard",
				"user_id" => $this->session->userdata("user_id") // pega o id da sessão do usuário
			);

			$this->template->show("dashboard/overview", $data);
		} else {

			$data = array(
				'page_title' => "Login"
			);
			$this->load->view('dashboard/template/header-no-auth', $data);
			$this->load->view('dashboard/login');
			$this->load->view('dashboard/template/scripts');
		}

    }

    public function logout()
	{
		$this->session->sess_destroy();
		redirect("dashboard");
    }
    
    public function ajax_login()
	{
		$data = array('sucess' => FALSE, 'messages' => array());

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$login = $this->input->post("user_name");
        $password = $this->input->post("user_password");
        
        $this->form_validation->set_rules($login, 'Nome de usuário','trim|required|min_length[6]', array('required' => 'Nome de usuário é obrigatório!'));
        $this->form_validation->set_rules($password, 'Senha','trim|required|min_length[8]',array('required' => 'Senha é obrigatória e deve conter mais de 8 digitos!'));

		if ($this->form_validation->run()) {

            
            
            
		} else {
			$this->load->model('user');
			$result = $this->user->get_user_data($login); // busca resultados pela função no model
			if ($result) { // se recebeu algum resultado da busca no db ele entra no if

				$id = $result->user_id; // recebe o id
				$password_hash = $result->user_password_hash; // recebe a senha do db
				$name = $result->user_name;

				if (password_verify($password, $password_hash)) {
					$this->session->set_userdata("user_id", $id); // se deu tud certo, seta a sessão
					$this->session->set_userdata("user_name", $name);
				} else {
					$json['status'] = 0; // se a senha não bate, seta o estado de erro 0
				}
			} else {
				$json['status'] = 0; //se ocorreu algum erro na busca do resultado, mostra o estado de erro 0
			}

			if ($json['status'] == 0) { // verifica se ocorreu erros nas verificações acima
				$json['error_list']['#btn_login'] = "Usuário ou senha incorretos!"; // pega o array json, e define a msg de erro pra função error_list
				//que será mostrada no btn_login
			}
		}

		echo json_encode($json); // transforma o json em arquivo legivel em javascript
	}
}