<?php

class Enana
{
    private $nombre; 
    private $puntosVida; 
    private $situacion; 

    public function __construct($nombre, $puntosVida)
    {
        $this->nombre = $nombre;
        $this->puntosVida = $puntosVida;
        $this->actualizarSituacion();
    }

    public function heridaLeve()
    {
        $this->puntosVida -= 10;
        $this->actualizarSituacion();
    }

    public function heridaGrave()
    {
        $this->puntosVida = 0;
        $this->situacion = "limbo";
    }

    public function pocima()
    {
        if ($this->situacion !== "limbo") {
            $this->puntosVida += 10;
            $this->actualizarSituacion();
        }
    }

    public function pocimaExtra()
    {
        if ($this->situacion === "limbo") {
            $this->puntosVida = 50;
            $this->situacion = "viva";
        }
    }

    private function actualizarSituacion()
    {
        if ($this->puntosVida > 0) {
            $this->situacion = "viva";
        } elseif ($this->puntosVida <= 0 && $this->situacion !== "limbo") {
            $this->situacion = "muerta";
        }
    }

    // Getter's & Setter's

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getPuntosVida()
    {
        return $this->puntosVida;
    }

    public function setPuntosVida($puntosVida): self
    {
        $this->puntosVida = $puntosVida;
        $this->actualizarSituacion();
        return $this;
    }

    public function getSituacion()
    {
        return $this->situacion;
    }

    public function setSituacion($situacion): self
    {
        $this->situacion = $situacion;
        return $this;
    }
}
?>
