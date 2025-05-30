<?php
require_once 'Cuenta.php';

class CajaAhorro extends Cuenta {
    // No es necesario redefinir casi nada.
    // Hereda todos los atributos y métodos de Cuenta.
    protected string $tipo = "Caja de Ahorros";
  
}
?>