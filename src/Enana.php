<?php

class Enana
{
    private $nombre;
    private $puntosVida;
    private $situacion;

    public function __construct($a1, $a2)
    {
        $this->nombre = $a1;
        $this->puntosVida = $a2;
        $this->actualizarSituacion();
    }

    public function heridaLeve()
    {
        // Se le quitan 10 puntos de vida a la Enana y se actualiza la situación
        $this->puntosVida -= 10;
        $this->actualizarSituacion();
    }

    public function heridaGrave()
    {
        // Se le quita toda la vida y se coloca en el limbo
        $this->puntosVida = 0;
        $this->situacion = "limbo";
    }

    public function pocima()
    {
        // Recupera 10 puntos de vida y se actualiza la situación si es necesario
        // No afecta a enanas en el limbo
        if ($this->situacion !== "limbo") {
            $this->puntosVida += 10;
            $this->actualizarSituacion();
        }
    }

    public function pocimaExtra()
    {
        // Devuelve a la vida del limbo y otorga 50 puntos de vida
        // Solo afecta a enanas en el limbo
        if ($this->situacion === "limbo") {
            $this->puntosVida = 50;
            $this->situacion = "viva";
        }
    }

    private function actualizarSituacion()
    {
        // Actualiza la situación dependiendo de los puntos de vida
        if ($this->puntosVida <= 0) {
            $this->situacion = "limbo";
        } elseif ($this->situacion === "limbo" && $this->puntosVida > 0) {
            $this->situacion = "viva";
        } elseif ($this->puntosVida > 0) {
            $this->situacion = "viva";
        } else {
            $this->situacion = "muerta";
        }
    }

    // Getters & setters
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