<?php
include 'Persona.php';
include 'Cliente.php';
class Cuenta {
    private int $numeroCuenta;
    private Cliente $cliente;
    private float $saldo = 0.0;
    private DateTime $fechaApertura;
    private bool $estado; // true = activa, false = inactiva
    private string $tipo = "Cuenta Bancaria";

    public function __construct(int $numeroCuenta, Cliente $cliente, bool $estado){
        $this->numeroCuenta = $numeroCuenta;
        $this->cliente = $cliente;
        $this->fechaApertura = new DateTime();  // fecha actual
        $this->estado = $estado;
        // saldo ya inicializado en 0.0 por defecto
    }

    // Getters
    public function getNumeroCuenta(): int {
        return $this->numeroCuenta;
    }

    public function getCliente(): Cliente {
        return $this->cliente;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public function getFechaApertura(): DateTime {
        return $this->fechaApertura;
    }

    public function isActivo(): bool {
        return $this->estado;
    }
    public function getTipo(): string {
        return $this->tipo;
    }

    // Setters
    public function setNumeroCuenta(int $numeroCuenta){
        $this->numeroCuenta = $numeroCuenta;
    }

    public function setCliente(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function setSaldo(float $saldo){
        $this->saldo = $saldo;
    }

    public function setEstado(bool $estado){
        $this->estado = $estado;
    }

    public function __toString(): string {
        $estadoTexto = $this->estado ? "Activa" : "Inactiva";
        return "Número de Cuenta: " . $this->getNumeroCuenta() . "\n" .
               "Cliente:\n" . $this->cliente->__toString() .
               "Saldo: $" . number_format($this->saldo, 2) . "\n" .
               "Fecha de Apertura: " . $this->fechaApertura->format('Y-m-d H:i:s') . "\n" .
               "Estado: " . $estadoTexto . "\n" .
               "Tipo de Cuenta: " . $this->devolverTipo(). "\n"; 
    }
    public function saldoCuenta(){
            return $this->saldo;
    }
    public function realizarDeposito(float $deposito){
        $pudio = false;
        
        if ($deposito > 0){
            $saldoTemp = $this->getSaldo() + $deposito;
            $this->setSaldo($saldoTemp);
            $pudio = true;
        }
        return $pudio;
    }
    //Funciond e retiro, esta se tiene que modificar en relacion a la cuenta corriente. (Giro descubierto)
    public function realizarRetiro($retiro){
        $pudio = false;
        $saldoTemp = $this->getSaldo();
        if ($retiro > 0 && $saldoTemp >= $retiro){
            $saldoTemp = $saldoTemp - $retiro;
            $this->setSaldo($saldoTemp);
            $pudio = true;
        }
        return $pudio;        
    }
    public function devolverTipo() {
    return $this->getTipo();
    }
}

?>
