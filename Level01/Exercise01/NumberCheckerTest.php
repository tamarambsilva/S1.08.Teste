<?php


require_once "NumberChecker.php";

// Importar PHPUnit
use PHPUnit\Framework\TestCase;

// Cria a Classe de teste
class NumberCheckerTest extends TestCase {


    public function testIsEven(): void {

        $numberChecker = new NumberChecker(10);

        $this->assertTrue($numberChecker->isEven());
    }
    

    public function testIsOdd(): void { // Testa numero impar

        $numberChecker = new NumberChecker(7);

        $this->assertFalse($numberChecker->isEven());
    }

    public function testIsPositive(): void {  // Testa se o num é positivo
        $numberChecker = new NumberChecker(10);

        $this->assertTrue($numberChecker->isPositive());
    }

    public function testIsNegative(): void {
        $numberChecker = new NumberChecker(-5);

        $this->assertFalse($numberChecker->isPositive());
    }
}