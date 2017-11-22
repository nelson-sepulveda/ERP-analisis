/*global $, document, Chart, LINECHART, data, options, window*/
$(document).ready(function () {

    'use strict';

    // ------------------------------------------------------- //
    // Search Box
    // ------------------------------------------------------ //
    $('#search').on('click', function (e) {
        e.preventDefault();
        $('.search-box').fadeIn();
    });
    $('.dismiss').on('click', function () {
        $('.search-box').fadeOut();
    });

    // ------------------------------------------------------- //
    // Card Close
    // ------------------------------------------------------ //
    $('.card-close a.remove').on('click', function (e) {
        e.preventDefault();
        $(this).parents('.card').fadeOut();
    });


    // ------------------------------------------------------- //
    // Adding fade effect to dropdowns
    // ------------------------------------------------------ //
    $('.dropdown').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeIn();
    });
    $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeOut();
    });


    // ------------------------------------------------------- //
    // Login  form validation
    // ------------------------------------------------------ //
    $('#login-form').validate({
       messages: {
            loginUsername: 'Por favor ingrese su nombre',
            loginPassword: 'Por favor ingrese la contraseña'
        },
        submitHandler: function(form){
            var formulario = $('#login-form');
            console.log('logiiiin');

            $.ajax({
                url: "controller/login/login.php",
                method:'post',
                data:formulario.serialize(),
             success : function(data)
                 {
                    var obj = JSON.parse(data);

                    if(obj.login==true)
                    {
                        document.location.href='home.php'
                    }
                    else if(obj.login==false)
                    {
                        alert('no login')
                    } 
                 }
              });
          }
    });

    // ------------------------------------------------------- //
    // Register form validation modificado
    // ------------------------------------------------------ //
    $('#register-form').validate({
        messages: {
            registerUsername: 'Por favor ingrese su usuario',
            registerEmail: 'Por favor ingrese su email',
            registerPassword: 'Por favor digite una clave',
            
        },
         submitHandler: function(form){
            var formulario = $('#register-form');	
            console.log('llegamos a registrar');
         $.ajax({
            url: "controller/registro/registro_user.php",
            method:'post',
            data:formulario.serialize(),
         success : function(data)
             {
                var obj = JSON.parse(data);
                // console.log(data);
                // Terminar la parte de los modal
                if(obj.registro==false)
                {
                    alert('No se pudo registrar correctamente');
                    // console.log('Email ya se encuentra registrado');
                    // $('#register-username').val('');
                    // $('#register-email').val('');
                    // $('#register-passowrd').val('');
                }
                else if(obj.registro==true)
                {
                    alert('Se registro de manera correcta');
                    $('#register-username').val('');
                    $('#register-email').val('');
                    $('#register-passowrd').val('');    
                }
                // else if(obj.emailvalido==true && obj.registro==true)
                // {
                //     alert('Se registro de manera correcta');
                //     console.log('Se registro de manera correcta');
                // }
                // else
                // {
                //     console.log('no se pudo');
                // }

                

             }
          });
        }
    });

    // ------------------------------------------------------- //
    // Sidebar Functionality
    // ------------------------------------------------------ //
    $('#toggle-btn').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');

        $('.side-navbar').toggleClass('shrinked');
        $('.content-inner').toggleClass('active');

        if ($(window).outerWidth() > 1183) {
            if ($('#toggle-btn').hasClass('active')) {
                $('.navbar-header .brand-small').hide();
                $('.navbar-header .brand-big').show();
            } else {
                $('.navbar-header .brand-small').show();
                $('.navbar-header .brand-big').hide();
            }
        }

        if ($(window).outerWidth() < 1183) {
            $('.navbar-header .brand-small').show();
        }
    });

    // ------------------------------------------------------- //
    // Transition Placeholders
    // ------------------------------------------------------ //
    $('input.input-material').on('focus', function () {
        $(this).siblings('.label-material').addClass('active');
    });

    $('input.input-material').on('blur', function () {
        $(this).siblings('.label-material').removeClass('active');

        if ($(this).val() !== '') {
            $(this).siblings('.label-material').addClass('active');
        } else {
            $(this).siblings('.label-material').removeClass('active');
        }
    });

    // ------------------------------------------------------- //
    // External links to new window
    // ------------------------------------------------------ //
    $('.external').on('click', function (e) {

        e.preventDefault();
        window.open($(this).attr("href"));
    });

    // ------------------------------------------------------ //
    // For demo purposes, can be deleted
    // ------------------------------------------------------ //

    var stylesheet = $('link#theme-stylesheet');
    $( "<link id='new-stylesheet' rel='stylesheet'>" ).insertAfter(stylesheet);
    var alternateColour = $('link#new-stylesheet');

    if ($.cookie("theme_csspath")) {
        alternateColour.attr("href", $.cookie("theme_csspath"));
    }

    $("#colour").change(function () {

        if ($(this).val() !== '') {

            var theme_csspath = 'css/style.' + $(this).val() + '.css';

            alternateColour.attr("href", theme_csspath);

            $.cookie("theme_csspath", theme_csspath, { expires: 365, path: document.URL.substr(0, document.URL.lastIndexOf('/')) });

        }

        return false;
    });    

});
