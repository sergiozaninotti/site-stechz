$(".talk").hide();
eva.replace();

$(document).ready(function() {

    /*  $(function() {
          var url = location.href;
          if (url.indexOf("")) {
             
          } else {
              $(".navbar").removeClass("fadeInDown");
              $(".navbar").removeClass("d-none");
          }

      });*/

    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $(".navbar").removeClass("d-none");
            } else {
                $(".navbar").addClass("d-none");

            }
        });
    });



    $('#hero').slick({
        prevArrow: '<a class=" ctrl c1"><ion-icon name="ios-arrow-back" class="icon-slider purple mt-2"></ion-icon></a>',
        nextArrow: '<a class="ctrl c2"><ion-icon name="ios-arrow-forward" class="icon-slider purple mt-2"></ion-icon></a>',
        initialSlide: 0

    });

    var $slickElement = $('#hero');
    var $status = $('#sliderIndex');

    $slickElement.on('afterChange', function(event, slick, currentSlide, nextSlide) {
        //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
        var i = (currentSlide ? currentSlide : 0) + 1;
        if ($status == '') {
            $status.text('1 - 2');
        } else {
            $status.text(i + '-' + slick.slideCount);
        }

    });
    $(".lamp").hide();
    $(".lamp").slideDown(800).delay(2000, function() {
        $(this).addClass("l2");
    });

    $(".w1").mouseover(function() {
        $(".btn-project").css("visibility", "visible");
    });
    $(".w1").mouseleave(function() {
        $(".btn-project").css("visibility", "hidden");
    });

    $(".w2").mouseover(function() {
        $(".btn-project2").css("visibility", "visible");
    });
    $(".w2").mouseleave(function() {
        $(".btn-project2").css("visibility", "hidden");
    });

    new WOW().init();

    /*$(".talk").delay(3500).fadeIn(function() {
        $(".logo-whatsapp").css("color", "#ab24a5")
    });

    EXEMPLO DE ANIMAÇÕES COM RETORNO ANIMATE
    
    function animateCSS(element, animationName, callback) {
        const node = document.querySelector(element)
        node.classList.add('animated', animationName)

        function handleAnimationEnd() {
            node.classList.remove('animated', animationName)
            node.removeEventListener('animationend', handleAnimationEnd)

            if (typeof callback === 'function') callback()
        }

        node.addEventListener('animationend', handleAnimationEnd)
    }
    $("#card1").mouseover(function() {
        $(".span-km1").show().addClass("animated fadeIn");
        $(".btn-km1").addClass("animated shake delay-1s");
        animateCSS('.know-site', 'zoomOutRight', function() {
            $(".know-site").hide();

        });
    });

    $("#card1").mouseleave(function() {

        $(".know-site").removeClass("animated zoomOutRight");
        $(".know-site").show();
        $(".span-km1").hide();
        animateCSS('.know-site', 'zoomIn', function() {
            $(".know-site").show();
        });
    });

 */



    $('.form-head').click(function() {

        if ($(this).closest('.grop-from').attr('id') == 'signup') {
            $('.grop-from').attr('id', 'name');
            $('.icon-action').addClass('back');
        } else if ($(this).closest('.grop-from').attr('id') == 'success') {
            $('.grop-from').attr('id', 'signup');
            $('input').val('');
        }

    });

    $('.form-action').click(function() {

        var form_id = $('.grop-from').attr('id');
        $('.icon-action').addClass('back');

        if ($('#control-' + form_id).val() != '') {
            switch (form_id) {
                case 'name':
                    form_id = "phone";
                    break;
                case "phone":
                    form_id = "email";
                    break;
                case "email":
                    form_id = "password";
                    break;
                case "password":
                    form_id = "password-repeat";
                    break;
                case "password-repeat":
                    form_id = "success";
                    break;
                case "success":
                    form_id = "signup";
                    break;
            }
            $('.icon-action').addClass('back');

        } else {

            switch (form_id) {
                case 'name':
                    form_id = "signup";
                    $('.icon-action').removeClass('back');
                    break;
                case "phone":
                    form_id = "name";
                    break;
                case "email":
                    form_id = "phone";
                    break;
                case "password":
                    form_id = "email";
                    break;
                case "password-repeat":
                    form_id = "password";
                    break;
                case "success":
                    form_id = "signup";
                    break;
            }
            $('.icon-action').removeClass('back');
        }

        $('.grop-from').attr('id', form_id);

    });

    $('input').keyup(function() {
        $('.grop-from').removeClass('error');
        $('.error-text').fadeOut();

        if ($(this).val() != '') {
            $('.icon-action').removeClass('back');
        } else {
            $('.icon-action').addClass('back');
        }


    })

    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'fitImagesInViewport': false,
        'maxWidth': 700
    })


    //$copy = $("#copy");

    //$copy.arctext({ radius: 500, dir: -1 });

    /*
    $(".blue-bg").hide();
    $("#we-do-img").hide();
    $(".we-do").mouseover(function() {
        $(this).css("transition", "all 0.6s ease");
        $(".overlay2").hide();
        $("#we-do-img").show();
        $(".blue-bg").show();
    })

    $(".we-do").mouseleave(function() {
        $(".overlay2").show();
        $(".blue-bg").hide();
        $("#we-do-img").hide();
    })
*/
    //const selector = document.querySelector('h1')
    // selector.classList.add('magictime', 'spaceInLeft');

    /*
        $("#next").click(function() {
            $(".hero2").css("right", "0");
            $(".border").css("display", "none");
            $(".border2").css("display", "none");
        });


        $("#prev").click(function() {
            $(".hero2").css("right", "-100%");
            $(".border").css("display", "block");
        });

        //const selector = document.querySelector('.navbar')
        // selector.classList.add('magictime', 'slideDown');
    */

    //VALIDAÇÃO DO FORMULARIO DE CONTATO

    $(function() {
        $(".contact_form").validate({
            rules: {
                nome: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                whatsapp: {
                    required: true,
                    minlength: 11,
                },
                mensagem: {
                    required: true,
                },
            },
            messages: {
                nome: {
                    required: "Por favor, informe seu nome!",
                },
                email: {
                    required: "Por favor, informe seu e-mail!",
                    email: "Por favor, insira um e-mail válido!",
                },
                whatsapp: {
                    required: "Por favor, informe seu Whatsapp!",
                    min: "Insira seu número corretamente!"
                },
                mensagem: {
                    required: "Por favor, digite sua mensagem!"
                },
            },

            submitHandler: function(form) {
                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    //reCaptcha not verified
                    swal("Ocorreu um erro", "Por favor, confirme que você não é um Robo!", "error");
                    return false;
                } else {
                    $.ajax({
                        url: 'contato/send',
                        type: 'POST',
                        data: $(".contact_form").serialize(),
                        beforeSend: function() {
                            $(".rocket").removeClass("d-none");
                        },
                        success: function(data) {
                            $(".rocket").addClass("d-none");
                            swal("Sucesso", "E-mail enviado com sucesso! Em breve entraremos em contato com você.", "success");
                            $("form").trigger("reset");
                        }
                    });
                }

                return false;
            }
        });
    });

    //MASCARA DE TELEFONE
    jQuery("input#whatsapp")
        .mask("+55(99) 9999-9999?9")
        .focusout(function(event) {
            var target, phone, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if (phone.length > 10) {
                element.mask("+55(99) 99999-999?9");
            } else {
                element.mask("+55(99) 9999-9999?9");
            }
        });
});