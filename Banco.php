<?php
/* Defina una clase Banco con las siguiente variables instancias:
1. coleccionCuentaCorriente: variable que contiene una colección de instancias de la clase
Cuentas Corrientes.
2. coleccionCajaAhorro: variable que contiene una colección de instancias de la clase Caja de Ahorro .
3. ultimoValorCuentaAsignado: variable que contiene el ultimo valor asignado a una cuenta del banco.
4. coleccionCliente: variable que contiene una colección de instancias de la clase Cliente
4. En la clase Banco defina e implemente los siguientes métodos:
1. incorporarCliente(objCliente): permite agregar un nuevo cliente al Banco
2. incorporarCuentaCorriente(numeroCliente, montoDescubierto): Agregar una nueva
Cuenta a la colección de cuentas, verificando que el cliente dueño de la cuenta es cliente
del Banco.
3. incorporarCajaAhorro(numeroCliente):Agregar una nueva Caja de Ahorro a la colección de cajas
de ahorro, verificando que el cliente dueño de la cuenta es cliente del Banco.
4. realizarDeposito(numCuenta,monto): Dado un número de Cuenta y un monto, realizar depósito.
5. realizarRetiro(numCuenta,monto): Dado un número de Cuenta y un monto, realizar retiro. */
class Banco
{
    private array $coleccionCajaAhorro;
    private float $ultimoValorCuentaAsignado;
    private array $coleccionCliente;

    public function __construct($coleccionCajaAhorro, $ultimoValorCuentaAsignado, $coleccionCliente)
    {
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
        $this->coleccionCliente = $coleccionCliente;
    }
    // Getters
    public function getColeccionCajaAhorro(): array
    {
        return $this->coleccionCajaAhorro;
    }

    public function getUltimoValorCuentaAsignado(): float
    {
        return $this->ultimoValorCuentaAsignado;
    }

    public function getColeccionCliente(): array
    {
        return $this->coleccionCliente;
    }

    // Setters
    public function setColeccionCajaAhorro(array $coleccionCajaAhorro): void
    {
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;
    }

    public function setUltimoValorCuentaAsignado(float $valor): void
    {
        $this->ultimoValorCuentaAsignado = $valor;
    }

    public function setColeccionCliente(array $coleccionCliente): void
    {
        $this->coleccionCliente = $coleccionCliente;
    }

    // Metodo a revisar, la verdad, no esta del todo sano pero es para mostrar nomas.
    public function __toString(): string
    {
        $cadena = "=== Banco ===\n";
        $cadena .= "Último número de cuenta asignado: " . $this->getUltimoValorCuentaAsignado() . "\n";

        // Mostrar clientes
        $cadena .= "\n>> Clientes:\n";
        if (count($this->coleccionCliente) > 0) {
            foreach ($this->coleccionCliente as $cliente) {
                $cadena .= $cliente . "\n";
            }
        } else {
            $cadena .= "No hay clientes registrados.\n";
        }

        // Mostrar cuentas de ahorro
        $cadena .= "\n>> Cuentas Caja de Ahorro:\n";
        if (count($this->coleccionCajaAhorro) > 0) {
            foreach ($this->coleccionCajaAhorro as $cuenta) {
                $cadena .= $cuenta . "\n";
            }
        } else {
            $cadena .= "No hay cuentas de ahorro registradas.\n";
        }
        return $cadena;
    }

    public function incorporarCliente($objCliente)
    {
        $pudio = true;
        $clientesTemp = $this->getColeccionCliente();
        $clientesTemp[] = $objCliente;
        $this->setColeccionCliente($clientesTemp);
        return $pudio;
    }
    /* incorporarCuentaCorriente(numeroCliente, montoDescubierto): Agregar una nueva
Cuenta a la colección de cuentas, verificando que el cliente dueño de la cuenta es cliente
del Banco.*/
    public function incorporarCuentaCorriente($numeroCliente, $montoDescubierto) {}
}
