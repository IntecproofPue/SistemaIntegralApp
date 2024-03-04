<?php
  require_once('load.php');



  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {



       $sql = "exec prcAutenticacionUsuario @vchUsuario='$username', @vbPass ='$password'";
       //echo "<br>Voy a ejecutar la consulta: <b>$sql</b>";
       $stmt = sqlsrv_query($GLOBALS['conn'], $sql);
       //echo "<br>===Contenido del smt :<br>";
       //print_r($stmt);
       //echo "===<br>";

       if ($stmt === false) {
           die(print_r(sqlsrv_errors(), true));
       }

// Fetch the output
       while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
           //echo "<br><br>Contenido del ROW<br>";
           //print_r($row);
           //echo "<br><br>Tamaño del ROW<br>";
           //echo sizeof($row);
           //echo "<br><br>";
           //var_dump($row);
           $GLOBALS['row']=$row;

       }

// Close statement and connection
       sqlsrv_free_stmt($stmt);
       sqlsrv_close($GLOBALS['conn']);


    return false;
   }

?>
