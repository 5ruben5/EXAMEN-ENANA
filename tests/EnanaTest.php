<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {

    public function testCreandoEnana() {
        $enanaViva = new Enana("Viva", 20);
        $this->assertEquals("viva", $enanaViva->getSituacion());

        $enanaMuerta = new Enana("Muerta", 0);
        $this->assertEquals("muerta", $enanaMuerta->getSituacion());

        $enanaLimbo = new Enana("Limbo", -5);
        $this->assertEquals("limbo", $enanaLimbo->getSituacion());
    }

    public function testHeridaLeveVive() {
        $enana = new Enana("Viva", 20);
        $enana->heridaLeve();
        $this->assertGreaterThan(0, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testHeridaLeveMuere() {
        $enana = new Enana("Muerta", 0);
        $enana->heridaLeve();
        $this->assertLessThanOrEqual(0, $enana->getPuntosVida());
        $this->assertEquals("muerta", $enana->getSituacion());
    }

    public function testHeridaGrave() {
        $enana = new Enana("Viva", 20);
        $enana->heridaGrave();
        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }

    public function testPocimaRevive() {
        $enana = new Enana("Muerta", 10);
        $enana->pocima();
        $this->assertGreaterThan(0, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testPocimaNoRevive() {
        $enana = new Enana("Limbo", 0);
        $puntosVidaOriginal = $enana->getPuntosVida();
        $situacionOriginal = $enana->getSituacion();
        $enana->pocima();
        $this->assertEquals($puntosVidaOriginal, $enana->getPuntosVida());
        $this->assertEquals($situacionOriginal, $enana->getSituacion());
    }

    public function testPocimaExtraLimbo() {
        $enana = new Enana("Limbo", 0);
        $enana->pocimaExtra();
        $this->assertEquals(50, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }
}
?>
