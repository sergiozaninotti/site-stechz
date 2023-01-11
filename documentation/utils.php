<?php 

/* FUNÇÕES DE CONTROLLER */

//CONSTRUTOR PARA CLASSES, CHAMADA DE LIBRARY, HELPERS, E DEFINIÇÃO DE TIMEZONE
function __construct(){

    parent::__construct();
    $this->load->helper(array('form','url')); // TRAZ OS HELPERS EM ARRAY
    $this->load->library('form_validation');
    $this->load->model('option_model','option'); // FAZ O LOAD DO MODEL QUE SERÁ USADO NO CONTROLLER INTEIRO, 1º NOME DO MODEL E 2º APELIDO

    date_default_timezone_set('America/Sao_Paulo');
}

//REGRAS DE VALIDAÇÃO
$this->form_validation->set_rules('username','Nome de Usuário','trim|required|min_length[5]');
$this->form_validation->set_rules('email','Email','trim|required|valid_email');
$this->form_validation->set_rules('password','Senha','trim|required|min_length[6]');
$this->form_validation->set_rules('password_match','Repita a senha','trim|required|min_length[6]|matches[password]');
//TRIM RETIRA OS ESPAÇOS EM BRANCO, MATCHES VALIDA SE AS SENHAS SÃO IGUAIS

$this->form_validation->set_message('password_match', 'As senhas não batem!'); // SET MESSAGE DEFINE A MENSSAGEM QUE APARECERÁ PARA O USUÁRIO

$this->form_validation->run() == FALSE // INICIA A FUNÇÃO DE VALIDAÇÃO
validation_errors(); // MOSTRA AS MENSAGENS DE ERRO


//FUNÇÕES DE FORMULÁRIOS
$this->input->post(); // PEGA TODOS OS CAMPOS PASSADOS POR POST DO FORMULÁRIO
$this->option->update_option('user_login', $data_form['username']);
$this->option->update_option('user_email', $data_form['email']);
$this->option->update_option('user_password', password_hash($data_form['password'], PASSWORD_DEFAULT)); // FUNÇÃO PARA ENCRIPTAR
//PEGA INSERIR OU ATUALIZAR DADOS NO DB, 1ºPARAMETRO O MODEL, 2º FUNÇÃO DO MODEL, 3º DADOS

/* FIM DAS FUNÇÕES DE CONTROLLER */

/* FUNÇÕES DE MODEL */

$query = $this->db->get('options', 1); // PEGA OS DADOS DO DB NUMA QUERY 1º PARAMETRO A TABELA, 2º NUMERO DE LINHAS Á BUSCAR
$this->db->where('option_name',$option_name) // FILTRO DE BUSCA, 1º PARAMETRO NOME DA TABELA, 2º VARIAVEL
$query->num_rows() == 1 // NUM_ROWS VERIFICA QUANTAS LINHAS FORAM ENCONTRADAS NESTE CASO SETA = 1
$row = $query->row(); // ROW() PEGA A LINHA ENCONTRADA
return $row->option_value;// RETORNA A OPÇÃO SETADA NA LINHA ENCONTRADA 
$this->db->update('options'); // FAZ UM UPDATE NA TABELA DEFINIDA
$this->db->affected_rows(); // FUNÇÃO QUE VERIFICA QUANTAS LINHAS FORAM AFETADAS PELA QUERY DE ATUALIZAÇÃO
$data = array( 
    'option_name' => $option_name, // ENVIA OS DADOS PARA O DB EM FORMATO DE ARRAY, 1º PARAM.. TABELA DE INSERÇÃO 2º A VARIAVEL
    'option_value' => $option_value
);

$this->db->insert('options',$data); // INSERE NO DB 1P TABELA DE INSERÇÃO 2P ARRAY COM OS DADOS
return $this->db->insert_id(); // FUNÇÃO QUE RECUPERA A ULTIMA INSERÇÃO DE ID FEITA NO DB


/*FIM DAS FUNÇÕES DE MODEL /*

/* FUNÇÕES DE HELPERS */
$ci = & get_instance(); // PEGA A INSTANCIA DE UMA CLASSE E ATRIBUÍ PARA A VARIAVEL
$ci->session->set_userdata('aviso',$msg); // SALVA OS DADOS PASSADOS POR PARAMETRO NUMA SESSION COM SET_USERDATA E DADOS, E ATRIBUÍ PARA 'AVISO', SET_USERDATA GRAVA OS DADOS NA SESSÃO
$destroy=TRUE // COMANDO QUE DESTRÓI UMA SESSÃO
$retorno = $ci->session->userdata('aviso');// RECEBE OS DADOS DA SESSÃO ACIMA E ATRIBUI PARA UMA VARIAVEL, USERDATA SERVE PARA LER OS DADOS DA SESSÃO
if($destroy) $ci->session->unset_userdata('aviso'); // VERIFICA SE EXISTE UMA MSG SALVA EM SESSÃO E DESTROI COM UNSET_USERDATA('AVISO') <- NOME ATRIBUIDO A MSG
return $retorno;

/* FIM DAS FUNÇÕES DE HELPERS */

