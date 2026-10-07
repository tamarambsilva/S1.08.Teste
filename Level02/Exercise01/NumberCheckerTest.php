<?php


require_once __DIR__ . "/NumberChecker.php";

// Importar PHPUnit
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

// Cria a Classe de teste
class NumberCheckerTest extends TestCase {


    #[DataProvider('evenNumbersProvider')]
    public function testIsEven(int $number, bool $expected): void
    {
        $numberChecker = new NumberChecker($number);

        $this->assertSame($expected, $numberChecker->isEven());
    }

    public static function evenNumbersProvider(): array {

        return [[10, true],[7, false],[4, true],[9, false],];
    }

    #[DataProvider('positiveNumbersProvider')]
    public function testIsPositive(int $number, bool $expected): void {

        $numberChecker = new NumberChecker($number);

        $this->assertSame($expected, $numberChecker->isPositive());
    }

    public static function positiveNumbersProvider(): array {

        return [[10, true],[-5, false], [20, true],[-10, false],];
    }
}