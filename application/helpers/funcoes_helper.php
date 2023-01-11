<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('set_msg')){ // verifica se a função existe, se ela não exister, então é criada
    
    function set_msg($msg=NULL){
        
        $ci = & get_instance(); // pega a instancia da classe que esta sendo utilizada no controller Setup (instalar)
        $ci->session->set_userdata('aviso',$msg); // como pegou a instancia, invés de utilizar $this-> utiliza a variavel atribuida $ci
        //nome do campo será aviso, se não vier nada, não seta nenhum valor na session

        //aqui define que esta as msgs de erro ficarão salva na sessão
    }

}

if(!function_exists('get_msg')){ // pega a msg

    function get_msg($destroy=TRUE){ //função para ler a msg, exibir na tela e dps q mostra ao usuário ela é apagada

        $ci = & get_instance();
        $retorno = $ci->session->userdata('aviso'); // pega de volta a msg setada na session, se ela existir

        if($destroy) $ci->session->unset_userdata('aviso'); // destroy o dado da session com unset_userdata, se ela for true
        return $retorno;

    }
}

if(!function_exists('login_verify')){

    function login_verify($redirect='dashboard/login'){
        $ci = & get_instance();

        //verifica se existe a sessão com a variavél logged, se não existir redireciona para a page login
        if ($ci->session->userdata('logged') != TRUE) {
            set_msg("<div class='alert alert-danger' role='alert'><i class='material-icons text-white align-middle mr-2'>error</i>Faça seu login para continuar.</div>");
            redirect($redirect);
        }
    }
}

if(!function_exists('textLength')){
function textLength($description,$start,$end){
    
    $formated = substr($description,$start,$end);
    if(strlen($formated) > 30){
        echo $formated.'...';
    }else{
        echo $formated;
    }

    }
}

if(!function_exists('dateDefaultPT')){
    function dateDefaultPT($date){
        $newDate = date('d-m-Y H:i', strtotime($date));
        return $newDate;
        }
}


