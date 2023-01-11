const BASE_URL = "http://localhost/stechz/";

function clearErrors() {
    $(".has-error").removeClass("has-error");
    $(".help-block").html("");
}

function showErrors(error_list) { // recebe como parametro o erro que sera passado pelo controller
    clearErrors();

    $.each(error_list, function(id, message) { // .each lista os erros da variavel do parametro, function (id,message), recebe a msg 
        $("#error_block").addClass("has-error");
        $(".help-block").html(message) // adc a menssagem na class help-block
    });
}

function showErrorsModal(error_list) { // FUNÇÃO PARA MODAL POIS ELE PRECISA PEGAR SOMENTE CADA CAMPO SEPARADO PARA MOSTRAR O ERRO
    clearErrors();

    $.each(error_list, function(id, message) { // .each lista os erros da variavel do parametro, function (id,message), recebe a msg 
        $("#error_block").addClass("has-error");
        $(id).siblings(".help-block").html(message) // pega o id do irmão do span help-block pois fica dentro da mesma div
    });
}

function loading(message = "") { // recebe a variavel message vazia pois será adc a msg por parametro
    return "<i class='fas fa-spinner fa-spin'></i>" + message;
}

function uploadImg(input_file, img, input_path) {

    src_before = img.attr("src"); // pega o caminho da imagem do upload e armazena na variavel, pois se der algum erro ja tem o caminho armazenado
    img_file = input_file[0].files[0]; // pega os arquivos que vem do input file no parametro e 1P variavel recebida de parametro, 2P comando para pegar os arquivos na posição[0]
    form_data = new FormData(); // função que cria um novo formulario

    form_data.append("image_file", img_file); // pega o formulario e adiciona o campo que vem do controller Dashboard linha 102, que faz o upload via php da imagem

    $.ajax({
        url: BASE_URL + "dashboard/ajax_upload_img", // pega a url + o controller com a função de upload
        dataType: "json", // define o tipo de dado a ser recebido 
        cache: false, // não salva em cache a imagem
        contentType: false,
        processData: false,
        data: form_data,
        type: "POST", // recebe este formulario acima que é só para enviar a imagem via post
        beforeSend: function() {
            clearErrors();
            $(".help-block").html(loading("Carregando imagem..."));
        },
        success: function(response) {
            clearErrors();

            if (response["status"]) { // se a resposta deste formulário for true, ele armazena no array status a resposta
                img.attr("src", response["img_path"]); // pega o src da img, e a resposta do caminho da imagem
                input_path.val(response["img_path"]); // pega o parametro input_path que vem da view, pega o caminho
                // e salva la na view de professores ou usuarios
            } else {

                img.attr("src", src_before); // se der erro, ele pega o src da img anterior
                input_path.siblings(".help-block").html(loading(response["error"])); // e mostra a msg de error pelo array['error] mostrado no controller
                //sempre colocar o sibling para pegar input que esteja na mesma div, ou parent para subir uma div

            }
        },
        error: function() {
            img.attr("src", src_before); // se der qualquer error generico, ele carrega a primeira imagem feita o upload
        }
    })

}