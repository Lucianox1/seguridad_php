<?php
/*string password_hash ( string $password , integer $algo [, array $options ] )*/

$contraseña = password_hash('pedrito',PASSWORD_DEFAULT,['cost' => 12]);
$comprobar = password_verify('ada',$contraseña);
echo var_dump($comprobar);
echo $comprobar;
?>
