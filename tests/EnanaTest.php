<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {

    public function testCreandoEnana() {
        $enanaViva = new Enana('Viviana', 30);
        $this->assertEquals('Viviana', $enanaViva->getNombre());
        $this->assertEquals(30, $enanaViva->getPuntosVida());
        $this->assertEquals('viva', $enanaViva->getSituacion());

        $enanaMuerta = new Enana('Muertita', -5);
        $this->assertEquals('Muertita', $enanaMuerta->getNombre());
        $this->assertEquals(-5, $enanaMuerta->getPuntosVida());
        $this->assertEquals('muerta', $enanaMuerta->getSituacion());

        $enanaLimbo = new Enana('Limbosa', 0);
        $this->assertEquals('Limbosa', $enanaLimbo->getNombre());
        $this->assertEquals(0, $enanaLimbo->getPuntosVida());
        $this->assertEquals('limbo', $enanaLimbo->getSituacion());
    }

    public function testHeridaLeveVive() {
        $enana = new Enana('HeridaViva', 20);
        $enana->heridaLeve();
        $this->assertGreaterThan(0, $enana->getPuntosVida());
        $this->assertEquals('viva', $enana->getSituacion());
    }

    public function testHeridaLeveMuere() {
        $enana = new Enana('HeridaMuerta', 5);
        $enana->heridaLeve();
        $this->assertLessThanOrEqual(0, $enana->getPuntosVida());
        $this->assertEquals('muerta', $enana->getSituacion());
    }

    public function testHeridaGrave() {
        $enana = new Enana('HeridaGrave', 30);
        $enana->heridaGrave();
        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals('limbo', $enana->getSituacion());
    }

    public function testPocimaRevive() {
        $enanaMuerta = new Enana('Muerta', -5);
        $enanaMuerta->pocima();
        $this->assertGreaterThan(0, $enanaMuerta->getPuntosVida());
        $this->assertEquals('viva', $enanaMuerta->getSituacion());
    }

    public function testPocimaNoRevive() {
        $enanaLimbo = new Enana('Limbosa', 0);
        $enanaLimbo->pocima();
        $this->assertEquals(0, $enanaLimbo->getPuntosVida());
        $this->assertEquals('limbo', $enanaLimbo->getSituacion());
    }

    public function testPocimaExtraLimbo() {
        $enanaLimbo = new Enana('Limbosa', 0);
        $enanaLimbo->pocimaExtra();
        $this->assertEquals(50, $enanaLimbo->getPuntosVida());
        $this->assertEquals('viva', $enanaLimbo->getSituacion());
    }
}
?>
