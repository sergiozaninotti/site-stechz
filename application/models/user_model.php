<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function __construct()
    {

        parent::__construct();
        $this->load->database();
    }

    public function get_user_data($user_name)
    {

        $this->db
            ->select("*")
            ->from("users")
            ->where("user_name", $user_name);

        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return NULL;
        }
    }

    public function get_data($id, $select=NULL)
    {

        if (!empty($select)) { 
            $this->db->select($select);
        }
        $this->db->from("users");
        $this->db->where("user_id",$id);
        return $this->db->get();
    }

    public function insert($data)
    {
        $this->db->insert("users",$data);
    }

    public function update($id, $data)
    {
        $this->db->where("user_id",$id);
        $this->db->update("users",$data);
    }

    public function delete($id)
    {
        $this->db->where("user_id",$id);
        $this->db->delete("users");
    }

    public function is_duplicated($field,$value,$id = NULL){
        
        if(!empty($id)){
            $this->db->where("user_id <>", $id);
        }
        $this->db->from("users");
        $this->db->where($field,$value);
        return $this->db->get()->num_rows() > 0; // retorna todos os dados se for encontrado alguma coisa na linha da busca
    }

    // ordem fica assim, [0] pega o course_name, [1] nada, [2] crouse_description
    var $column_search = array("user_name", "user_email"); // variavel global da classe que recebe as colunas onde serão feito as buscas pelo datatable
    var $column_order = array("user_name",); // variavel recebe os campos do db que pegara a ordem de duração, seguindo a sequencia que esta no banco de dados

    private function _get_data_table()
    { // função privada que é utilizada somente por outras funções aqui no model

        $search = NULL;
        if ($this->input->post("search")) { // verifica se o input enviado por post chamado search foi enviado

            $search = $this->input->post("search")["value"]; // recebe o input search se foi enviado, na posição value, ou seja, atribui o search enviado ao value e armazena na variavel

        }

        $order_column = NULL;
        $order_dir = NULL;

        $order = $this->input->post("order");
        if (isset($order)) {
            $order_column = $order[0]["column"]; // o datatable sempre pega as posições por vetores [0], neste caso inicia no 0, e pega a coluna
            $order_dir = $order[0]["dir"];
        }

        $this->db->from("users"); // seleciona da onde vai pegar a informação

        if ($search) {
            $first = TRUE; // variavel que irá verificar se é a primeira vez q faz a busca no db

            foreach ($this->column_search as $field) { // se existir o search, então pega a variavel coluna que vem da classe, pega se o valor passado tiver dentro do course_name ou course_description
                if ($first) {
                    $this->db->group_start(); // função group_start faz uma busca em grupos, como se tivessem entre () cada item buscado
                    $this->db->like($field, $search); // busca com o comando like do sql, 1P campo do db a ser buscado e 2P é o que o usuario digitou vindo da view
                    $first = FALSE; // após a primeira busca ele seta como falso para não entrar mais neste if
                } else {
                    $this->db->or_like($field, $search); // se oq o usuário buscou nao retornou nenhum resultado na busca anterior, faz uma nova busca, ele vai acumulando as buscas
                }
            }

            if (!$first) { // verifica se o usuario fez a busca e não retornou nada no group_start, então seta a verificação como !first = falso
                $this->db->group_end(); // encerra o loop, pra nao dar erro se tiver mais de um campo 
            }
        }

        if (isset($order)) { // veririca se o order foi setado, ou seja , se o usuario clicou
            $this->db->order_by($this->column_order[$order_column], $order_dir); // pega a ordem pela coluna column_order e passa a posição $order_column que é o course_name
            //continuando, pega o nome da coluna e define a ordem que é o $order_dir
        }
    }

    public function get_datatable()
    {

        $length = $this->input->post("length");
        $start = $this->input->post("start");
        $this->_get_data_table();
        if (isset($length) && $length != -1) { // verifica se o usuário setou o botão de quantidade de dados para mostrar e se for diferente de -1, (-1 pega todos os dados)
            $this->db->limit($length, $start); // então ele limita as buscas pelo length e pelo start
            return $this->db->get()->result(); // então retorna o resultado da query nesta função
        }
    }

    public function records_filtered()
    { // lista quantos dados tem no db e quantos esta mostrando naquela busca
        $this->_get_data_table(); // chama a função para os dados que foram passados anteriormente
        return $this->db->get()->num_rows();  // pega a quantidade de linhas retornadas na busca
    }

    public function records_total()
    { // lista quantos dados tem no db e quantos esta mostrando naquela busca
        $this->db->from("users"); // seleciona o db e a tabela
        return $this->db->count_all_results(); // função que conta todos os resultados que tem na tabela cursos
    }

}
