<?php
require_once 'Cuenta.php';

class CuentaCorriente extends Cuenta {
    private float $montoGiroDescubierto;
    protected string $tipo = "Cuenta Corriente";

    public function __construct(int $numeroCuenta, Cliente $cliente, bool $estado, float $montoGiroDescubierto) {
        // Llama al constructor de la clase padre
        parent::__construct($numeroCuenta, $cliente, $estado);

        // Inicializa el nuevo atributo
        $this->montoGiroDescubierto = $montoGiroDescubierto;
    }

    public function getMontoGiroDescubierto(): float {
        return $this->montoGiroDescubierto;
    }

    public function setMontoGiroDescubierto(float $monto) {
        $this->montoGiroDescubierto = $monto;
    }

    // Sobrescribe realizarRetiro para permitir el giro en descubierto
    public function realizarRetiro($monto): bool {
        $saldoDisponible = $this->getSaldo() + $this->montoGiroDescubierto;
        $pudio = false;
        if ($monto > 0 && $monto <= $saldoDisponible) {
            $nuevoSaldoTemp = $this->getSaldo() - $monto;
            $this->setSaldo($nuevoSaldoTemp);
            $pudio = true;
        }
        return $pudio;
    }



    // Redefinir toString agregando info adicional
    public function __toString(): string {
        $textoBase = parent::__toString();
        $textoBase .= ">> Giro en descubierto permitido hasta: $" . number_format($this->montoGiroDescubierto, 2) . "\n";
        return $textoBase;
    }
}
?>
