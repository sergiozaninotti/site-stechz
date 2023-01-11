$(document).ready(function() {

    $("#alterarCabecalho").click(function() {
        clearErrors();
        $("#form_cabecalho")[0].reset(); // função .reset reseta todos os campos de input de um formulário
        $("#cabecalho_img_path").attr("src", ""); //attr pega o atributo e neste caso limpa o que tiver dentro
        $("#cabecalhoModal").modal("show");

    });

    $("#addTeacher").click(function() {
        clearErrors();
        $("#form_teacher")[0].reset(); // reseta o form desde o primeiro input
        $("#teacher_img_path").attr("src", "");
        $("#teachersModal").modal("show");
    });

    $("#addUser").click(function() {
        clearErrors();
        $("#form_users")[0].reset(); // reseta o form desde o primeiro input
        $("#user_img_path").attr("src", "");
        $("#usersModal").modal("show");
    });

    $("#btn_upload_course_img").change(function() {

        uploadImg($(this), $("#course_img_path"), $("#course_img")); // a função criada no utils para mostrar a imagem, vai receber
        // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

    });

    $("#btn_upload_teacher_img").change(function() {

        uploadImg($(this), $("#teacher_img_path"), $("#teacher_img")); // a função criada no utils para mostrar a imagem, vai receber
        // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

    });

    $("#btn_upload_user_img").change(function() {

        uploadImg($(this), $("#user_img_path"), $("#user_img")); // a função criada no utils para mostrar a imagem, vai receber
        // o 1P que é o msm botão qnd mudar o estado, 2P, recebe o caminho da imagem ou seja a tag img, e 3P pega o input da img

    });


    /****************NOVO CÓDIGO *****************/
    $(function() {
        $("#login_form").validate({
            rules: {
                user_name: {
                    required: true,
                    nowhitespace: true,
                },
                user_password: {
                    required: true,
                    nowhitespace: true,
                }
            },
            messages: {
                user_name: {
                    required: "Por favor, digite seu nome de usuário!",
                    nowhitespace: "Espaços em branco não são permitidos!"
                },
                user_password: {
                    required: "Por favor, digite sua senha corretamente",
                    nowhitespace: "Espaços em branco não são permitidos!"
                }
            }

        });
    })


});