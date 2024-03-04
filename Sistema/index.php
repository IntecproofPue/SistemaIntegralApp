<?php
  ob_start();
  require_once('includes/load.php');
 require_once ('includes/pandora.php');
  //if($session->isUserLoggedIn(true)) { redirect('home.php', false);}




?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $tituloPagina; ?></title>
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- External Css -->
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/et-line.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="assets/css/plyr.css" />
    <link rel="stylesheet" href="assets/css/flag.css" />
    <link rel="stylesheet" href="assets/css/slick.css" /> 
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.nstSlider.min.css" />

    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">


    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <header class="header-2 access-page-nav">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header-top">
              <div class="logo-area">
                <a href="index.html"><img src="images/logo-2.png" alt=""></a>
              </div>
              <!-- <div class="top-nav">
                <a href="register.html" class="account-page-link">Register</a>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="padding-top-90 padding-bottom-90 access-page-bg">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="access-form">
              <div class="form-header">
                <h5><i data-feather="user"></i>Login</h5>
              </div>
				<?php //echo display_msg($msg); 
				
				?>
				<?php
 
if(isset($_POST['submit']))
 
{

    require_once('includes/load.php');
 
$emailAddress = $_POST['emailAddress'];
$passwordInserted = $_POST['passwordInserted'];
 
    //echo "<i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br>El usuario ha escrito : <b> $emailAddress </b><br>";
	//echo "El usuario ha escrito : <b> $passwordInserted </b>";
    //echo "<br>Aquí se inicia la validación de usuario.<br><br>";



    $pwd_peppered = hash_hmac("sha256", $passwordInserted, "Palabra Secreta");
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_DEFAULT);




   // echo "<i><span style='color: #8a6d3b' size='-2'> Sólo para fines de desarrollo</span></i><br>    Usuario: $emailAddress<br>
   //                   PWD Sin encriptar: $passwordInserted <br>
   //                   PWD Encriptada: $pwd_hashed<bR>
   //                   Tamaño de cadena:". strlen($pwd_hashed);



  



                if(empty($errors)){

                    $user = authenticate_v2($emailAddress, $passwordInserted);
                   // print_r($GLOBALS['row']);
                    $row =$GLOBALS['row'];

                    //echo $row['vchMensaje'];


                    if($row['bResult']==0){ ?>



                            <div style="background-color: #c82333; text-align: center"><?php echo "<i><span style='color: #ededee' size='-2'> $errorUsuPwdTxt</span></i><br />"; ?></div>



                <?php    }elseif ($row['bResult']==1){ ?>

                        <div style="background-color: #117a8b; text-align: center"><?php echo "<i><span style='color: #ededee' size='-2'> $bienUsuPwdTxt</span></i><br />"; ?></div>
                        <script type="text/javascript">
                            //Redireccionamiento tras 5 segundos
                            setTimeout( function() { window.location.href = "persona/altaPersona/altaPersona.html"; }, 3000 );
                        </script>
                <?php    }else{

                    }




                }else{
echo "erorr====";

                }

	
	
	
	






}
				

 //echo display_msg($msg);

 
?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                  <input type="email" placeholder="Email Address" class="form-control" name="emailAddress">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control" name="passwordInserted">
                </div>
                <div class="more-option">
                  <div class="mt-0 terms">
                    <!--<input class="custom-radio" type="checkbox" id="radio-4" name="termsandcondition">
                    <label for="radio-4">
                      <span class="dot"></span> Remember Me
                    </label>-->
                  </div>
                  <a href="#">Forget Password?</a>
                </div>
				  <input type="submit" name="submit" value="Submit Form" class="button primary-bg btn-block"><br>
                <!--<button class="button primary-bg btn-block" type="submit">Login</button>-->
              </form>
             <!-- <div class="shortcut-login">
                <span>Or connect with</span>
                <div class="buttons">
                  <a href="#" class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                  <a href="#" class="google"><i class="fab fa-google"></i>Google</a>
                </div>
                <p>Don't have an account? <a href="register.html">Register</a></p>
              </div>-->
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/jquery.nstSlider.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/visible.js"></script>
    <script src="assets/js/jquery.countTo.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/plyr.js"></script>
    <script src="assets/js/tinymce.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="js/custom.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC87gjXWLqrHuLKR0CTV5jNLdP4pEHMhmg"></script>
    <script src="js/map.js"></script>
  </body>
</html>