$(function() {

    $("#login_form").submit(function() {

        $.ajax({
            type: "post",
            url: BASE_URL + "dashboard/ajax_login", // url da onde vai pegar o formulário
            dataType: "json", // tipo de dados que irá retornar
            data: $(this).serialize(), // dados de entrada, pega os dados do formulário enviados por post
            beforeSend: function() {
                clearErrors(); // primeira ele limpa os erros, se existir
                $(".help-block").html(loading("Verificando...")); // pega o help bloco e aplica a função spin e msg
            },
            success: function(json) { // recebe como parametro o json de status que verifica se deu certo
                if (json['status'] == 1) {
                    clearErrors();
                    $("#btn_login").css("display", "none");
                    $(".help-block").html(loading("Acessando..."));
                    window.location = BASE_URL + "dashboard"
                } else {
                    showErrors(json['error_list']);
                }
            }, //fim do success
            error: function(response) {
                console.log(response);
            }
        })

        return false;

    })

    $("#form_course").submit(function() {

        $.ajax({
            type: "POST",
            url: BASE_URL + "dashboard/ajax_save_course",
            dataType: "json",
            data: $(this).serialize(), //$this pega o form que esta sendo submetido, ou seja, pega ele mesmo
            beforeSend: function() {
                clearErrors();
                $("#btn_save_course").siblings(".help-block").html(loading("Verificando..."));
            },
            success: function(response) {
                clearErrors();
                if (response['status']) {
                    $("#coursesModal").modal("hide");
                } else {
                    showErrorsModal(response['error_list']);
                }
            }
        });

        return false; // retorna falso se o usuário apertar o botão de submit se enviar os dados em branco
    });

    $("#form_teacher").submit(function() {

        $.ajax({
            type: "POST",
            url: BASE_URL + "dashboard/ajax_save_teacher",
            dataType: "json",
            data: $(this).serialize(), //$this pega o form que esta sendo submetido, ou seja, pega ele mesmo
            beforeSend: function() {
                clearErrors();
                $("#btn_save_teacher").siblings(".help-block").html(loading("Verificando..."));
            },
            success: function(response) {
                clearErrors();
                if (response['status']) {
                    $("#teachersModal").modal("hide");
                } else {
                    showErrorsModal(response['error_list']);
                }
            }
        });

        return false; // retorna falso se o usuário apertar o botão de submit se enviar os dados em branco
    });

    $("#form_users").submit(function() {

        $.ajax({
            type: "POST",
            url: BASE_URL + "dashboard/ajax_save_user",
            dataType: "json",
            data: $(this).serialize(), //$this pega o form que esta sendo submetido, ou seja, pega ele mesmo
            beforeSend: function() {
                clearErrors();
                $("#btn_save_user").siblings(".help-block").html(loading("Verificando..."));
            },
            success: function(response) {
                clearErrors();
                if (response['status']) {
                    $("#usersModal").modal("hide");
                } else {
                    showErrorsModal(response['error_list']);
                }
            }
        });

        return false; // retorna falso se o usuário apertar o botão de submit se enviar os dados em branco
    });

    $("#btn_user_id").click(function() {

        $.ajax({
            type: "POST",
            url: BASE_URL + "dashboard/ajax_get_users",
            dataType: "json",
            data: { "user_id": $(this).attr("user_id") }, // data recebe o user_id que vem do atributo user_id criado na overview linha 102
            success: function(response) {
                clearErrors();
                $("#form_users")[0].reset();
                $.each(response['input'], function(id, value) {
                    $("#" + id).val(value);
                });
                $("#usersModal").modal("show");
            }
        });

        return false; // retorna falso se o usuário apertar o botão de submit se enviar os dados em branco
    });

    function active_btn_course() {
        $(".btn_edit_course").click(function() {

            $.ajax({
                type: "POST",
                url: BASE_URL + "dashboard/ajax_get_data_course",
                dataType: "json",
                data: { "course_id": $(this).attr("course_id") }, // data recebe o course_id que vem do atributo course_id criado na overview
                success: function(response) {
                    clearErrors();
                    $("#form_course")[0].reset();
                    $.each(response['input'], function(id, value) {
                        $("#" + id).val(value);
                    });
                    $("#course_img_path").attr("src", response["img"]["course_img_path"]); // pega o campo $course_img da view, pega o atributo src, da tag[img] e joga o caminho do db [course_img]
                    // essa função traz apenas uma imagem, para mais imagens tem q fazer o foreach acima 
                    $("#coursesModal").modal();
                }
            });

        })
    }

    function active_btn_teacher() {
        $(".btn_edit_teacher").click(function() {

            $.ajax({
                type: "POST",
                url: BASE_URL + "dashboard/ajax_get_data_teacher",
                dataType: "json",
                data: { "teacher_id": $(this).attr("teacher_id") }, // data recebe o course_id que vem do atributo course_id criado na overview
                success: function(response) {
                    clearErrors();
                    $("#form_teacher")[0].reset();
                    $.each(response['input'], function(id, value) {
                        $("#" + id).val(value);
                    });
                    $("#teacher_img_path").attr("src", response["img"]["teacher_img_path"]); // pega o campo $course_img da view, pega o atributo src, da tag[img] e joga o caminho do db [course_img]
                    // essa função traz apenas uma imagem, para mais imagens tem q fazer o foreach acima 
                    $("#teachersModal").modal();
                }
            });

        })
    }

    var dt_course = $("#dt_course").DataTable({
        "columns": [
            { "width": "7%" }, // tamanho das colunas
            { "width": "20%" },
            { "width": "10%" },
            { "width": "10%" },
            { "width": "33%" },
            { "width": "10%" },
            { "width": "10%" }
        ],
        "autoWidth": false,
        "serverSide": true, // indica que as requições são por ajax que pega a tabela do db
        "processing": true, // enquanto traz os dados mostra o processando
        "ajax": {
            "url": BASE_URL + "dashboard/ajax_list_course",
            "type": "post",
        },
        "columnDefs": [
            { targets: "no-sort", orderable: false }, // define a ordenação falsa, no-sort é a classe que ira pra view que recebe o ordertable:false 
            { targets: "dt-center", className: false, className: 'dt-body-center' }, // aplica a classe pra centralizar os dados da tabela
        ],
        "initComplete": function() { // initComplete é uma função que ao finalizar a busca dos dados, pode receber outras funções
            active_btn_course(); // função vinda do ajaxcalls que pega o campo id para editar
        }
    });

    var dt_teacher = $("#dt_teacher").DataTable({
        "columns": [
            { "width": "20%" },
            { "width": "10%" },
            { "width": "55%" },
            { "width": "15%" },
        ],
        "autoWidth": false,
        "serverSide": true, // indica que as requições são por ajax que pega a tabela do db
        "processing": true, // enquanto traz os dados mostra o processando
        "ajax": {
            "url": BASE_URL + "dashboard/ajax_list_teacher",
            "type": "post",
        },
        "columnDefs": [
            { targets: "no-sort", orderable: false }, // define a ordenação falsa, no-sort é a classe que ira pra view que recebe o ordertable:false 
            { targets: "dt_center", className: false } // aplica a classe pra centralizar os dados da tabela
        ],
        "initComplete": function() { // initComplete é uma função que ao finalizar a busca dos dados, pode receber outras funções
            active_btn_teacher(); // função vinda do ajaxcalls que pega o campo id para editar
        }
    });

    var dt_user = $("#dt_user").DataTable({
        "columns": [
            { "width": "10%" },
            { "width": "30%" },
            { "width": "30%" },
            { "width": "10%" },
            { "width": "20%" },
        ],
        "autoWidth": false,
        "serverSide": true, // indica que as requições são por ajax que pega a tabela do db
        "processing": true, // enquanto traz os dados mostra o processando
        "ajax": {
            "url": BASE_URL + "dashboard/ajax_list_user",
            "type": "post",
        },
        "columnDefs": [
            { targets: "no-sort", orderable: false }, // define a ordenação falsa, no-sort é a classe que ira pra view que recebe o ordertable:false 
            { targets: "dt_center", className: false } // aplica a classe pra centralizar os dados da tabela
        ]
    });


})