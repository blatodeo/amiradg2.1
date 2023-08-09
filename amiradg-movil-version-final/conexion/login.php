<?php
    include 'conexion.php';
       header('Access-Control-Allow-Origin: http://localhost:8100');
       header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
       header('Access-Control-Allow-Headers: Content-Type');
       header("Access-Control-Allow-Credentials: true");
       header('Access-Control-Max-Age: 86400');
                                                      // cache for 1 day
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
   
             $json = file_get_contents('php://input');
  
              $data = json_decode($json, true);
  
              $nombre=$data('nombre');
  
              $pass=md5($data[ 'contrasena']);
  
              $_SESSION[ 'nombre']="akrosh300@gmail.com";
  
              $query= mysqli_query($con, "SELECT * FROM user_login where nombre= '$nombre' AND contrasena = '$contraseña'");
  
              if($query->num_rows > 0) {
  
                  $res=array('status'=>200);
  
              }else{
  
                 $res=array('status'=>200, 'mess '=> 'username or password in correct', 'email'=>$_SESSION['nombre']);
  
              }
  
              echo json_encode($res);
  
        }

?>
