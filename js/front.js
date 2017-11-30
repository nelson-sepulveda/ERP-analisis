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

    

    //------------------------------------------------------//
    //Registro Producto
    //------------------------------------------------------//

    $('#productoG').on('click',function(event)
    {
        event.preventDefault();

        var nombre = $('#nombre_producto').val()
        var color = $('#color_producto').val()
        var tela = $('#tela_producto').val()
        var proveedor = $('#provee').val()

        var talla_s = $('#talla_s').val()
        var talla_m = $('#talla_m').val()
        var talla_l = $('#talla_l').val()
        var talla_xl = $('#talla_xl').val()
        var talla_xxl = $('#talla_xxl').val()
        
        if(nombre!="" && color!="" && tela!="" && proveedor!="")
        {
           	
            $.ajax({
                method: "POST",
                url: "controller/registro/registro_producto.php",
                data: { nombre: nombre, color: color, tela:tela, proveedor : proveedor}
              }).done(function(data)
               {
                  console.log(data);
               });
        }

    })  


    //------------------------------------------------------//
    //Registro Cliente
    //------------------------------------------------------//

    $('#registroCliente').validate({
        rules:
        {
            nombre_cli: {required:true},
            documento_cli:{required:true},
            telefono_cli: {required:true},
            email_cli:{required:true},
            contraseña_cli:{required:true}
        },
        messages: {
             nombre_cli: 'Por favor ingrese el nombre',
             documento_cli: 'Por favor ingrese el documento',
             telefono_cli: 'Por favor digite una telefono',
             email_cli: 'Por favor digite un email',
             contraseña_cli:'Por favor digite una contraseña'
         },
         submitHandler: function(form){
             var formulario = $('#registroCliente');
 
             $.ajax({
                 url: "controller/registro/registro_cliente.php",
                 method:'post',
                 data:formulario.serialize(),
              success : function(data)
                  {
                     if(data=='true')
                     {
                         alert('Registro exitoso')
                        $('#nombre_cli').val('')
                        $('#documento_cli').val('')
                        $('#telefono_cli').val('')
                        $('#email_cli').val('')
                        $('#contraseña_cli').val('')
                        $('#myCliente').modal('hide')   
                     }  
                     else
                     {
                         alert('No se completo el registro')
                     }
                  }
               });
           }
     });

    //------------------------------------------------------//
    //Registro Proveedor
    //------------------------------------------------------//
    $('#registroProveedor').validate({
        rules:
        {
            nombre_pro: {required:true},
            nit_pro:{required:true},
            direccion_pro: {required:true}
        },
        messages: {
             nombre_pro: 'Por favor ingrese el nombre',
             nit_pro: 'Por favor ingrese el NIT',
             direccion_pro: 'Por favor digite una direccion'
         },
         submitHandler: function(form){
             var formulario = $('#registroProveedor');
 
             $.ajax({
                 url: "controller/registro/registro_proveedor.php",
                 method:'post',
                 data:formulario.serialize(),
              success : function(data)
                  {

                     if(data=='true')
                     {
                         alert('Registro exitoso')
                         $('#nombre_pro').val('')
                         $('#nit_pro').val('')
                         $('#direccion_pro').val('')  
                         $('#myProveedor').show('slow')   
                     }  
                     else
                     {
                         alert('No se completo el registro')
                     }
                  }
               });
           }
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

            $.ajax({
                url: "controller/login/login.php",
                method:'post',
                data:formulario.serialize(),
             success : function(data)
                 {

                    if(data=='true')
                    {
                        document.location.href='home.php'
                    }  
                    else
                    {
                        $('#loginUsername').val('')
                        $('#loginPassword').val('')
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
                var obj = JSON.parse(data)
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

/**
 * Modificar proveedor
 */

$('#update_proveedor_modal').on('show.bs.modal', function(event){
    
    var este=$(this);
    var modal = $('#update_proveedor_modal');
    var button=$(event.relatedTarget);

    var id = button.data('id')
    modal.find('#ID_provee').val(id)

    var nombre = button.data('nombre')
    modal.find('#nombre_up').val(nombre)

    var nit = button.data('nit')
    modal.find('#nit_up').val(nit)

    var direccion = button.data('direccion')
    modal.find('#direccion_up').val(direccion)
});

$('#updateProveedor').validate({

    rules:
    {
        nombre_up: {required:true},
        nit_up:{required:true},
        direccion_up: {required:true}
    },
    messages: {
         nombre_up: 'Por favor ingrese el nombre',
         nit_up: 'Por favor ingrese el NIT',
         direccion_up: 'Por favor digite una direccion'
     },
     submitHandler: function(form){
         var formulario = $('#updateProveedor');

         $.ajax({
             url: "controller/editar/actualizar_proveedor.php",
             method:'post',
             data:formulario.serialize(),
          success : function(data)
              {

                 if(data=='true')
                 {
                     alert('Actualizacion exitoso')
                     $('#nombre_up').val('')
                     $('#nit_up').val('')
                     $('#direccion_up').val('')  
                     $('#update_proveedor_modal').show('slow')  
                 }  
                 else
                 {
                     alert('No se completo la actualizacion')
                 }
              }
           });
       }
 });


 /**
  * 
  Editar producto  

  */


  $('#update_producto_modal').on('show.bs.modal', function(event){
    
    var este=$(this);
    var modal = $('#update_producto_modal');
    var button=$(event.relatedTarget);


    var id = button.data('id')
    modal.find('#ID_produc').val(id)

    var nombre = button.data('nombre')
    modal.find('#nombre_pro_up').val(nombre)

    var color = button.data('color')
    modal.find('#color_pro_up').val(color)

    var tela = button.data('tela')
    modal.find('#tela_pro_up').val(tela)
});


$('#updateProducto').validate({
    
    rules:
    {
        nombre_pro_up: {required:true},
        color_pro_up:{required:true},
        tela_pro_up: {required:true}
    },
    messages: {
        nombre_pro_up: 'Por favor ingrese el nombre',
        color_pro_up: 'Por favor ingrese el color',
        tela_pro_up: 'Por favor digite la tela'
     },
     submitHandler: function(form){
         var formulario = $('#updateProducto');

         $.ajax({
             url: "controller/editar/actualizar_producto.php",
             method:'post',
             data:formulario.serialize(),
          success : function(data)
              {

                 if(data=='true')
                 {
                     alert('Actualizacion exitoso')
                     $('#nombre_pro_up').val('')
                     $('#color_pro_up').val('')
                     $('#tela_pro_up').val('')  
                     $('#update_producto_modal').show('slow')  
                 }  
                 else
                 {
                     alert('No se completo la actualizacion')
                 }
              }
           });
       }
 });




 /**
  * Editar Cliente
  */
  $('#update_cliente_modal').on('show.bs.modal', function(event){
    
    var este=$(this);
    var modal = $('#update_cliente_modal');
    var button=$(event.relatedTarget);


    var id = button.data('id')
    modal.find('#id_cliente').val(id)

    var nombre = button.data('nombre')
    modal.find('#nombre_cli_up').val(nombre)

    var doc = button.data('doc')
    modal.find('#documento_cli_up').val(doc)

    var tela = button.data('telefono')
    modal.find('#telefono_cli_up').val(tela)

    var email = button.data('email')
    modal.find('#email_cli_up').val(email)
});


$('#updateCliente').validate({
    
    messages: {
        nombre_cli_up: 'Por favor ingrese el nombre',
        documento_cli_up: 'Por favor ingrese el documento',
        telefono_cli_up: 'Por favor digite el telefono',
        email_cli_up:'Por favor digite el email'
     },
     submitHandler: function(form){
         var formulario = $('#updateCliente');

         $.ajax({
             url: "controller/editar/actualizar_cliente.php",
             method:'post',
             data:formulario.serialize(),
          success : function(data)
              {

                 if(data=='true')
                 {
                     alert('Actualizacion exitoso')
                     $('#nombre_cli_up').val('')
                     $('#documento_cli_up').val('')
                     $('#telefono_cli_up').val('')  
                     $('#email_cli_up').val('')
                     $('#update_cliente_modal').show('slow')  
                 }  
                 else
                 {
                     alert('No se completo la actualizacion')
                 }
              }
           });
       }
 });



 /**
  * 
    Consultar Cedula del cliente
  */

  $('#busquedaCC').on('click',function(event)
  {
      event.preventDefault();

      var cc = $('#consultaDoc').val()
      
          $.ajax({
              method: "POST",
              url: "controller/validar.php",
              data: { cc: cc}
            }).done(function(data)
             {
                if(data=='true') 
                {
                    alert('el usuario se encuentra activo')
                }
                else
                {
                    alert('El usuario no se encuentra registrado')
                    $('#myCliente').modal('show')
                    $('#consultaDoc').val('')
                }
             });

  })  




  