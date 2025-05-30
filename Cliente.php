<?php
class Cliente extends Persona {
    private int $numeroCliente;

    public function __construct(int $dni, string $nombre, string $apellido, int $numeroCliente) {
        parent::__construct($dni, $nombre, $apellido);
        $this->numeroCliente = $numeroCliente;
    }

    public function getNumeroCliente(): int {
        return $this->numeroCliente;
    }

    public function setNumeroCliente(int $numeroCliente) {
        $this->numeroCliente = $numeroCliente;
    }

    public function __toString(): string {
        return parent::__toString() . "Número de Cliente: " . $this->getNumeroCliente() . "\n";
    }
}
?>
