<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        $enanaViva = new Enana("EnanaViva", 50);
        $this->assertEquals(50, $enanaViva->getPuntosVida());
        $this->assertEquals("viva", $enanaViva->getSituacion());

        $enanaMuerta = new Enana("EnanaMuerta", -10);
        $this->assertEquals(-10, $enanaMuerta->getPuntosVida());
        $this->assertEquals("muerta", $enanaMuerta->getSituacion());

        $enanaLimbo = new Enana("EnanaLimbo", 0);
        $this->assertEquals(0, $enanaLimbo->getPuntosVida());
        $this->assertEquals("limbo", $enanaLimbo->getSituacion());
    }

    public function testHeridaLeveVive() {
        $enana = new Enana("EnanaViva", 30);
        $enana->heridaLeve();
        $this->assertGreaterThan(0, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testHeridaLeveMuere() {
        $enana = new Enana("EnanaMuerta", 5);
        $enana->heridaLeve();
        $this->assertLessThan(0, $enana->getPuntosVida());
        $this->assertEquals("muerta", $enana->getSituacion());
    }

    public function testHeridaGrave() {
        $enana = new Enana("EnanaViva", 30);
        $enana->heridaGrave();
        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }
    
    public function testPocimaRevive() {
        $enana = new Enana("EnanaMuerta", 5);
        $enana->pocima();
        $this->assertGreaterThan(0, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testPocimaNoRevive() {
        $enana = new Enana("EnanaLimbo", 0);
        $enana->pocima();
        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }

    public function testPocimaExtraLimbo() {
        $enana = new Enana("EnanaLimbo", 0);
        $enana->pocimaExtra();
        $this->assertEquals(50, $enana->getPuntosVida());
        $this->assertEquals("viva", $enana->getSituacion());
    }
}
?>