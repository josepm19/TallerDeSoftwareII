<?php
#entrada
$correo=$_POST["correo"];
$password=$_POST["password"];



#proceso
$db = new PDO('mysql:host=localhost;dbname=pisquerito;charset=utf8', 'root', '');
$stmt = $db->query("SELECT * FROM administrador WHERE email='$correo' AND pass='$password'");
$usuarios = $stmt->fetchAll();
/*print_r($usuarios);
die();*/
$validacion = false;

if (count($usuarios) == 1) {
    # Datos correctos
    $validacion = true;
    $id=intval($_GET["id"]);
    $nombre=intval($_GET["nombre"]);

        $db = new PDO('mysql:host=localhost;dbname=pisquerito;charset=utf8', 'root', '');
        $stmt = $db->query("SELECT * FROM administrador WHERE email='$correo'");
        $admin = $stmt->fetchAll();    
        
        session_start();
    $_SESSION["correo"] = $correo;
    $_SESSION["nombre"]=$nombres;
    $_SESSION["apellido"]=$apellido;


}

# Salida
if ($validacion) {
    header('Location: admin/index.php');
}
else {
    header('Location: login.php?error=1');
}
?>