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

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array(); // mostra os erros na view

		$login = $this->input->post("user_name");
		$password = $this->input->post("user_password");

		if (empty($login)) {
			$json['status'] = 0;
			$json['error_list']['#user_name'] = 'Digite seu nome de usuário!'; // define a msg de erro para o input #username
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

	public function ajax_upload_img()
	{

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$config['upload_path'] = "./tmp/"; // carrega uma library de upload, onde recebe a pasta qual vai receber os uploads
		$config['allowed_types'] = "gif|png|jpg"; // define quais arquivos são permitidos fazer upload
		$config['overwrite'] = TRUE; // se já existir o arquivo do upload, ele reescreve com o ultimo enviado

		$this->load->library('upload', $config); // faz o load da library e passa como parametro o array config

		$json = array();
		$json['status'] = 1;

		if (!$this->upload->do_upload("image_file")) { // verifica se ocorreu algum erro com o upload do arquivo
			$json['status'] = 0; // se ocorreu erro, seta o status como 0
			$json['error'] = $this->upload->display_errors("", ""); // armazena a msg de error da propria função da library upload no array json
		} else {
			if ($this->upload->data()["file_size"] <= 1024) { // $this->upload->data() pega dados do item do upload, neste caso em json vendo se é menor que 1mb
				$file_name = $this->upload->data()["file_name"]; // se ok, pega o nome da imagem em json e atribui para a variavel
				$json["img_path"] = base_url() . "tmp/" . $file_name; // se ok, pega o caminho da imagem e atribui para o array json	
			} else {
				$json['status'] = 0; // se ocorreu erro, seta o status como 0
				$json['error'] = "Arquivo não pode ser maior que 1MB";
			}
		}

		echo json_encode($json);
	}

	public function ajax_save_course()
	{

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array(); // mostra os erros na view

		$this->load->model("courses_model", "courses");

		$data = $this->input->post();

		if (empty($data['course_name'])) {
			$json['error_list']["#course_name"] = "Nome do curso não pode estar em branco"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		} else {
			if ($this->courses->is_duplicated("course_name", $data["course_name"], $data["course_id"])) {
				//chama a função e passa os parametros: 1P nome do campo no db, 2P nome do campo do input na view, 3P id passado pelo input
				$json['error_list']["#course_name"] = "Nome de curso já existe!";
			}
		}

		if (empty($data['event_date'])) {
			$json['error_list']["#event_date"] = "Por favor, selecione uma data!"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		}else{
			$dateFormated = date("Y-m-d H:i:s", strtotime($data['event_date'])); 
			$data['event_date'] = $dateFormated;
		}

		if (empty($data['event_location'])) {
			$json['error_list']["#event_location"] = "Por favor, insira o local do evento"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		}

		if (empty($data['course_description'])) {
			$json['error_list']["#course_description"] = "Por favor, insira a descrição do evento!"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		}

		/*$data["course_duration"] = floatval($data["course_duration"]); // transforma o valor passado pelo input post em float pois ele vem em formato de string do formulario

		if (empty($data['course_duration'])) {
			$json['error_list']["#course_duration"] = "Duração do curso é obrigatório!"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		} else if (!($data["course_duration"] > 0 && $data["course_duration"] < 99.9)) {
			//chama a função e passa os parametros: 1P nome do campo no db, 2P nome do campo do input na view, 3P id passado pelo input
			$json['error_list']["#course_duration"] = "Duração do curso deve ser até 99.9h";
			// declaramos no db que o campo course_duration é decimail(3.1) isto quer dizer que o db aceita apenas 99.1 três digitos com uma casa decimal
			// se fosse decimal(4.1) então poderia ser 100.1
		}*/

		if (!empty($json['error_list'])) { // se o error_list não estiver vazio mostra o valor 0
			$json['status'] = 0;
		} else {

			if (!empty($data["course_img"])) {

				//http://localhost/system/tmp/pizza.jpg para entendimento

				$file_name = basename($data["course_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
				$old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
				$new_path = getcwd() . "/assets/img/courses/" . $file_name;
				rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

				$data["course_img"] = "/assets/img/courses/" . $file_name; // caminho da imagem que vai para o db
			} else {
				unset($data["course_img"]);
			}

			if (empty($data["course_id"])) { // verifica se esta vazio o id do curso e insere o curso com os dados do array
				$this->courses->insert($data);
			} else {
				$course_id = $data["course_id"]; // pega o id que veio do curso que veio da view
				unset($data["course_id"]); // **MUITO IMPORTATE - usa a função unset para removelo da seleção do update, se não ele da um update no id do curso tbm
				$this->courses->update($course_id, $data); // envia o id como paramtro para o update, mas não atualiza ele pois já retirou da seleção com unset

			}
		}

		echo json_encode($json); // recebe a resposta das requisições ajax, que contem o $json['status] e $json['error_list']
	}

	public function ajax_save_teacher()
	{

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array(); // mostra os erros na view

		$this->load->model("teacher_model", "teacher");

		$data = $this->input->post();

		if (empty($data['teacher_name'])) {
			$json['error_list']["#teacher_name"] = "Nome do professor não pode estar em branco"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		} else {
			if ($this->teacher->is_duplicated("teacher_name", $data["teacher_name"], $data["teacher_id"])) {
				//chama a função e passa os parametros: 1P nome do campo no db, 2P nome do campo do input na view, 3P id passado pelo input
				$json['error_list']["#teacher_name"] = "<div class='badge badge-default bg-danger text-white mt-1'>Este professor já esta cadastrado</div>";
			}
		}

		if (!empty($json['error_list'])) { // se o error_list não estiver vazio mostra o valor 0
			$json['status'] = 0;
		} else {

			if (!empty($data["teacher_img"])) {

				//http://localhost/system/tmp/pizza.jpg para entendimento

				$file_name = basename($data["teacher_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
				$old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem
				$new_path = getcwd() . "/assets/img/teachers/" . $file_name;
				rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

				$data["teacher_img"] = "/assets/img/teachers/" . $file_name; // caminho da imagem que vai para o db
			} else {
				unset($data["teacher_img"]);
			}

			if (empty($data["teacher_id"])) { // verifica se esta vazio o id do curso e insere o curso com os dados do array
				$this->teacher->insert($data);
			} else {
				$teacher_id = $data["teacher_id"]; // pega o id que veio do curso que veio da view
				unset($data["teacher_id"]); // **MUITO IMPORTATE - usa a função unset para removelo da seleção do update, se não ele da um update no id do curso tbm
				$this->teacher->update($teacher_id, $data); // envia o id como paramtro para o update, mas não atualiza ele pois já retirou da seleção com unset

			}
		}

		echo json_encode($json); // recebe a resposta das requisições ajax, que contem o $json['status] e $json['error_list']
	}

	public function ajax_save_user()
	{

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$json = array();
		$json['status'] = 1;
		$json['error_list'] = array(); // mostra os erros na view

		$this->load->model("user_model", "user");

		$data = $this->input->post();

		if (empty($data['user_name'])) {
			$json['error_list']["#user_name"] = "Campo nome de usuário obrigatório"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		} else {
			if ($this->user->is_duplicated("user_name", $data["user_name"], $data["user_id"])) {
				//chama a função e passa os parametros: 1P nome do campo no db, 2P nome do campo do input na view, 3P id passado pelo input
				$json['error_list']["#user_name"] = "Este usuário já está cadastrado!";
			}
		}

		if (empty($data['user_full_name'])) {
			$json['error_list']["#user_full_name"] = "Insira seu nome corretamente!"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		}

		if (empty($data['user_email'])) {
			$json['error_list']["#user_email"] = "Campo e-mail é obrigatório"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		} else if ($this->user->is_duplicated("user_email", $data["user_email"], $data["user_id"])) {
			//chama a função e passa os parametros: 1P nome do campo no db, 2P nome do campo do input na view, 3P id passado pelo input
			$json['error_list']["#user_email"] = "Este e-mail já está cadastrado!";
		} else if ($data['user_email'] != $data['user_email_match']) {
			$json['error_list']["#user_email_match"] = "Verifique se o e-mail está correto!";
		}


		if (empty($data['user_password'])) {
			$json['error_list']["#user_password"] = "Campo senha é obrigatório"; // verifica se o campo nome do curso esta em branco
			//1P mostra a função erro do helper, 2P pega o campo qual será mostrado o erro e 3P mostra a msg de erro
		} elseif ($data['user_password'] != $data['user_password_match']) {
			$json['error_list']["#user_password_match"] = "Verifique se a senha está correta!";
		}

		$data['user_password_hash'] = password_hash($data['user_password'], PASSWORD_BCRYPT);

		unset($data['user_email_match']);
		unset($data['user_password']);
		unset($data['user_password_match']);

		if (!empty($json['error_list'])) { // se o error_list não estiver vazio mostra o valor 0
			$json['status'] = 0;
		} else {

			if (!empty($data["user_img"])) {

				//http://localhost/system/tmp/pizza.jpg para entendimento

				$file_name = basename($data["user_img"]); // função basename pega o nome da imagem, então usa a função com a img passada pelo input
				$old_path = getcwd() . "/tmp/" . $file_name; // função getcwd pega o caminho da img até o system, e concatena com a pasta e o nome da imagem.. Pega desde a raiz do servidor
				$new_path = getcwd() . "/assets/img/users/" . $file_name;
				rename($old_path, $new_path); // move a imagem da pasta temporária para a pasta correta

				$data["user_img"] = "/assets/img/users/" . $file_name; // caminho da imagem que vai para o db
			} else {
				unset($data["user_img"]);
			}

			if (empty($data["user_id"])) { // verifica se o id do formulario na view esta vazio, se estiver ele insere
				$this->user->insert($data);
			} else {
				$user_id = $data["user_id"]; // pega o id que veio do curso que veio da view
				unset($data["user_id"]); // **MUITO IMPORTATE - usa a função unset para removelo da seleção do update, se não ele da um update no id do curso tbm
				$this->user->update($user_id, $data); // envia o id como paramtro para o update, mas não atualiza ele pois já retirou da seleção com unset

			}
		}

		echo json_encode($json); // recebe a resposta das requisições ajax, que contem o $json['status] e $json['error_list']
	}

	public function ajax_get_users()
	{

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$json = array();
		$json['status'] = 1;
		$json['input'] = array();

		$this->load->model("user_model", "user");

		$user_id = $this->input->post("user_id"); // pega o id do usuário vindo por post da view
		$data = $this->user->get_data($user_id)->result_array()[0]; // utiliza a função get do model passando o id do usuário para retornar os dados, o [0] indica que pegará somente 1 linha do array trazido 

		$json['input']['user_id'] = $data['user_id'];
		$json['input']['user_name'] = $data['user_name'];
		$json['input']['user_full_name'] = $data['user_full_name'];
		$json['input']['user_img_path'] = $data['user_img'];
		$json['input']['user_email'] = $data['user_email'];
		$json['input']['user_email_match'] = $data['user_email'];
		$json['input']['user_password'] = $data['user_password_hash'];
		$json['input']['user_password_match'] = $data['user_password_hash'];

		echo json_encode($json); // recebe a resposta das requisições ajax, que contem o $json['status] e $json['error_list']
	}

	public function ajax_get_data_course()
	{

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$json = array();
		$json['status'] = 1;
		$json['input'] = array();

		$this->load->model("courses_model", "courses");

		$course_id = $this->input->post("course_id"); // pega o id do usuário vindo por post da view
		$data = $this->courses->get_data($course_id)->result_array()[0]; // utiliza a função get do model passando o id do usuário para retornar os dados, o [0] indica que pegará somente 1 linha do array trazido 

		$json['input']['course_id'] = $data['course_id'];
		$json['input']['course_name'] = $data['course_name'];
		$json['input']['event_date'] = dateDefaultPT($data['event_date']);
		$json['input']['event_location'] = $data['event_location'];
		$json['input']['course_description'] = $data['course_description'];
		$json['input']['event_link'] = $data['event_link'];

		$json['img']['course_img_path'] = base_url().$data['course_img']; // 1P pega a tag da view que vai receber o dado, 2P name do input, 3P dado vindo do DB

		echo json_encode($json); // recebe a resposta das requisições ajax, que contem o $json['status] e $json['error_list']
	}

	public function ajax_get_data_teacher()
	{

		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$json = array();
		$json['status'] = 1;
		$json['input'] = array();

		$this->load->model("teacher_model", "teacher");

		$teacher_id = $this->input->post("teacher_id"); // pega o id do usuário vindo por post da view
		$data = $this->teacher->get_data($teacher_id)->result_array()[0]; // utiliza a função get do model passando o id do usuário para retornar os dados, o [0] indica que pegará somente 1 linha do array trazido 

		$json['input']['teacher_id'] = $data['teacher_id'];
		$json['input']['teacher_name'] = $data['teacher_name'];
		$json['input']['teacher_description'] = $data['teacher_description'];

		$json['img']['teacher_img_path'] = base_url().$data['teacher_img']; // 1P pega a tag da view que vai receber o dado, 2P name do input, 3P dado vindo do DB

		echo json_encode($json); // recebe a resposta das requisições ajax, que contem o $json['status] e $json['error_list']
	}

	public function ajax_list_course()
	{
		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$this->load->model("courses_model", "courses");
		$courses = $this->courses->get_datatable();

		$data = array();

		foreach ($courses as $course) { // a função get_datatable tras os dados e é feito o foreach para selecionar as linhas 
			$row = array();

			if ($course->course_img) { // verifica se tem alguma img no db e traz ela logo abaixo
				$row[] = '<img src="' . base_url() . $course->course_img . '" width="50px" height="50px">';
			} else { // se não deixa vazio
				$row[] = "";
			}

			$row[] = substr($course->course_name,0,30); // pega a linha $course e retorna o que tiver na coluna course_name do db

			$dateFormated = dateDefaultPT($course->event_date); 

			$row[] = $dateFormated;
			$row[] = $course->event_location;
			$description = substr($course->course_description,0,100);
			$row[] = $description.'...';
			if($course->active > 0){
				$row[] = 'Ativo';
			}else{
				$row[] = 'Inativo';
			}
			$row[] = '<div class="text-center"><button type="button" rel="tooltip" title="Editar" course_id="' . $course->course_id . '" class="btn btn-primary btn-link btn-sm btn_edit_course">
						<i class="material-icons">edit</i>
						</button>
						<button type="button" rel="tooltip" title="Deletar" course_id="' . $course->course_id . '" class="btn btn-danger btn-link btn-sm">
						<i class="material-icons">close</i>
						</button>
						</div>';

			$data[] = $row; // o array data vai receber toda essas linhas trazidas do db, e vai fazer esse loop para cada linha
		}

		$json = array( // retorno para o datatable

			"draw" => $this->input->post("draw"), // função do ajax que conecta o db com o servidor para fazer a requisição e trazer os dados da tabela, envia ele mesmo e tem q retornar
			"recordsTotal" => $this->courses->records_total(), // pega o retorno da função do model que traz os resultados de qnts cursos tem no db
			"recordsFiltered" => $this->courses->records_filtered(), // recordsTotal e  recordsFiltered são os nomes que o datatable precisa receber
			"data" => $data, //e por ultimo os dados que foram trazidos do db pelo foreach
		);

		echo json_encode($json);
	}

	public function ajax_list_teacher()
	{
		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$this->load->model("teacher_model", "teacher");
		$teachers = $this->teacher->get_datatable();

		$data = array();

		foreach ($teachers as $teacher) { // a função get_datatable tras os dados e é feito o foreach para selecionar as linhas 
			$row = array();
			$row[] = $teacher->teacher_name; // pega a linha $course e retorna o que tiver na coluna course_name do db

			if ($teacher->teacher_img) { // verifica se tem alguma img no db e traz ela logo abaixo
				$row[] = '<img src="' . base_url() . $teacher->teacher_img . '" width="50px" height="50px">';
			} else { // se não deixa vazio
				$row[] = "";
			}

			$row[] = $teacher->teacher_description;
			$row[] = '<div class="text-center"><button type="button" rel="tooltip" title="Editar" teacher_id="' . $teacher->teacher_id . '" class="btn btn-primary btn-link btn-sm btn_edit_teacher">
						<i class="material-icons">edit</i>
						</button>
						<button type="button" rel="tooltip" title="Deletar" id="' . $teacher->teacher_id . '" class="btn btn-danger btn-link btn-sm">
						<i class="material-icons">close</i>
						</button>
						</div>';

			$data[] = $row; // o array data vai receber toda essas linhas trazidas do db, e vai fazer esse loop para cada linha
		}

		$json = array( // retorno para o datatable

			"draw" => $this->input->post("draw"), // função do ajax que conecta o db com o servidor para fazer a requisição e trazer os dados da tabela, envia ele mesmo e tem q retornar
			"recordsTotal" => $this->teacher->records_total(), // pega o retorno da função do model que traz os resultados de qnts cursos tem no db
			"recordsFiltered" => $this->teacher->records_filtered(), // recordsTotal e  recordsFiltered são os nomes que o datatable precisa receber
			"data" => $data, //e por ultimo os dados que foram trazidos do db pelo foreach
		);

		echo json_encode($json);
	}

	public function ajax_list_user()
	{
		if (!$this->input->is_ajax_request()) { // função de segurança que não deixa executar o script diretamente
			exit("Acesso não permitido!");
		}

		$this->load->model("user_model", "user");
		$users = $this->user->get_datatable();

		$data = array();

		foreach ($users as $user) { // a função get_datatable tras os dados e é feito o foreach para selecionar as linhas 
			$row = array();

			//$row[] = $user->user_name; // pega a linha $course e retorna o que tiver na coluna course_name do db

			if ($user->user_img) { // verifica se tem alguma img no db e traz ela logo abaixo
				$row[] = '<img src="' . base_url() . $user->user_img . '" style="width:50px; height:50px; border-radius:100%;">';
			} else { // se não deixa vazio
				$row[] = "";
			}

			$row[] = $user->user_full_name;

			$row[] = $user->user_email;

			if($user->user_status > 0){
				$row[] = 'Ativo';
			}else{ 
				$row[] = 'Inativo';
			}
			
			$row[] = '<div class="text-center"><button type="button" rel="tooltip" title="Editar" user_id="' . $user->user_id . '" class="btn btn-primary btn-link btn-sm btn_edit_user">
						<i class="material-icons">edit</i>
						</button>
						<button type="button" rel="tooltip" title="Deletar" id="' . $user->user_id . '" class="btn btn-danger btn-link btn-sm">
						<i class="material-icons">close</i>
						</button>
						</div>';

			$data[] = $row; // o array data vai receber toda essas linhas trazidas do db, e vai fazer esse loop para cada linha
		}

		$json = array( // retorno para o datatable

			"draw" => $this->input->post("draw"), // função do ajax que conecta o db com o servidor para fazer a requisição e trazer os dados da tabela, envia ele mesmo e tem q retornar
			"recordsTotal" => $this->user->records_total(), // pega o retorno da função do model que traz os resultados de qnts cursos tem no db
			"recordsFiltered" => $this->user->records_filtered(), // recordsTotal e  recordsFiltered são os nomes que o datatable precisa receber
			"data" => $data, //e por ultimo os dados que foram trazidos do db pelo foreach
		);

		echo json_encode($json);
	}
}
