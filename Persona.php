<?php
class Persona{
    private int $dni;
    private string $nombre;
    private string $apellido;

    public function __construct(int $dni, string $nombre, string $apellido){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getDni(): int{
        return $this->dni;
    }
    public function getNombre(): string{
        return $this->nombre;
    }
    public function getApellido(): string{
        return $this->apellido;
    }

    public function setDni(int $dni){
        $this->dni = $dni;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }
    public function __toString(): string {
    return "DNI: " . $this->getDni() . "\n" .
           "Nombre: " . $this->getNombre() . "\n" .
           "Apellido: " . $this->getApellido() . "\n";
    }

    } 