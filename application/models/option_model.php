<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_model extends CI_Model {

	function __construct(){
		parent::__construct();
    }

    public function get_option($option_name){
        $this->db->where('option_name',$option_name);
        $query = $this->db->get('options', 1); // primeiro parametro é a tabela onde será feito a busca, 2º é qnts resultados deseja buscar

        if ($query->num_rows() == 1) { // se o número de linhas for = 1
            $row = $query->row();    // pega a linha encontrada e joga na variavel $row
            return $row->option_value;   // retorna a opção option_value da linha encontrada
        }else{
            return NULL;
        }
    }

    //função que verifica se existe dados então atualiza, se não insere os dados
    public function update_option($option_name, $option_value){
        $this->db->where('option_name',$option_name);
        $query = $this->db->get('options', 1); // primeiro parametro é a tabela onde será feito a busca, 2º é qnts resultados deseja buscar

        if ($query->num_rows() == 1) { 
           //já existe dados no banco então a função apenas atualiza 
            $this->db->set('option_value',$option_value);
            $this->db->where('option_name',$option_name);
            $this->db->update('options'); // seleciona a coluna que deseja atualizar, de acordo o filtro where e a tabela do db
            return $this->db->affected_rows(); // função que traz o numero de linhas afetada pela query de atualização

        }else{
            //não existe dados no db, então insere
            $data = array(
                'option_name' => $option_name,
                'option_value' => $option_value
            );

            $this->db->insert('options',$data);
            return $this->db->insert_id(); // função recupera a ultima inserção de id do banco de dados
        }
    }

    


}