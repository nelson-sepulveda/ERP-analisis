<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Studio Prince</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/std.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Inicio de Sesion</h1>
                  </div>
                  <p>Inicia sesion para acceder a nuestras herramientas</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form id="login-form" method="post">
                    <div class="form-group">
                      <input id="login-username" type="text" name="loginUsername" required="" class="input-material">
                      <label for="login-username" class="label-material">Usuario</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="loginPassword" required="" class="input-material">
                      <label for="login-password" class="label-material">Contraseña</label>
                    </div><input id="login" value="login" type="submit" class="btn btn-primary"></input>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="#myModal" data-toggle="modal" data-target="#myModal"   class="forgot-pass">Olvidaste la contraseña?</a><br><small>No tienes una cuenta?</small><a href="register.php" class="signup">Registrate</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal recuperar contraseña -->
  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 id="exampleModalLabel" class="modal-title">Recuperar Contraseña</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <p>Olvidaste tu contraseña</p>
          <form>
            <div class="form-group">
              <label>Email</label>
              <input type="email" placeholder="Direccion de Email" class="form-control">
            </div>
            <!-- <div class="form-group">       
              <label></label>
              <input type="password" placeholder="Password" class="form-control">
            </div> -->
            <!-- <div class="form-group">       
              <input type="submit" value="Recuperar" class="btn btn-primary">
            </div> -->
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
          <button type="button" class="btn btn-primary">Recuperar!</button>
        </div>
      </div>
     </div> 
    </div>
    <!-- Javascript files-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    
  </body>
</html>