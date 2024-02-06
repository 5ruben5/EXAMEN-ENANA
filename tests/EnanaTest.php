<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        #Se probará la creación de enanas vivas, muertas y en limbo y se comprobará tanto la vida como el estado
    // Crear enana muerta
    $enanaMuerta = new Enana("EnanaMuerta", 0);
    $this->assertEquals("muerta", $enanaMuerta->getSituacion());
    $this->assertEquals(0, $enanaMuerta->getPuntosVida());

    // Crear enana viva
    $enanaViva = new Enana("EnanaViva", 50);
    $this->assertEquals("viva", $enanaViva->getSituacion());
    $this->assertEquals(50, $enanaViva->getPuntosVida());

    // Crear enana en limbo
    $enanaLimbo = new Enana("EnanaLimbo", -10);
    $this->assertEquals("limbo", $enanaLimbo->getSituacion());
    $this->assertEquals(0, $enanaLimbo->getPuntosVida());

    // Realizar acciones en enana viva
    $enanaViva->heridaLeve();
    $this->assertEquals("viva", $enanaViva->getSituacion());
    $this->assertEquals(40, $enanaViva->getPuntosVida());

    $enanaViva->heridaGrave();
    $this->assertEquals("limbo", $enanaViva->getSituacion());
    $this->assertEquals(0, $enanaViva->getPuntosVida());

    $enanaViva->pocima();
    $this->assertEquals("viva", $enanaViva->getSituacion());
    $this->assertEquals(20, $enanaViva->getPuntosVida());

    $enanaViva->pocimaExtra();
    $this->assertEquals("viva", $enanaViva->getSituacion());
    $this->assertEquals(70, $enanaViva->getPuntosVida());
    }
    public function testHeridaLeveVive() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva

    }

    public function testHeridaLeveMuere() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta

    }

    public function testHeridaGrave() {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo

    }
    
    public function testPocimaRevive() {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva

    }

    public function testPocimaNoRevive() {
        #Se probará el efecto de administrar una pócima a una Enana en el libo
        #Se tendrá que probar que la vida y situación no ha cambiado

    }

    public function testPocimaExtraLimbo() {
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

    }
}
?>