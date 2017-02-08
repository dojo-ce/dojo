<?php

namespace Tests;

use PHPUnit_Framework_TestCase as PHPUnit;

class CountLettersTest extends PHPUnit
{
    private $_unidades = [ 0 => '', 1 => 'um','dois','tres','quatro','cinco','seis','sete','oito','nove'];
    private $_dezenas_dez = [ 0 => '', 11 => "onze","doze","treze","quatorze","quinze","dezesseis","dezessete","dezoito","dezenove"];
    private $_dezenas = [
        0 => '',
        10 => 'dez',
        20 => 'vinte',
        30 => 'trinta',
        40 => 'quarenta',
        50 => 'cinquenta',
        60 => 'sessenta',
        70 => 'setenta',
        80 => 'oitenta',
        90 => 'noventa'
    ];
    private $_centenas = [
        0 => '',
        100 => 'cem',
        200 => 'duzentos',
        300 => 'trezentos',
        400 => 'quatrocentos',
        500 => 'quinhentos',
        600 => 'seiscentos',
        700 => 'setecentos',
        800 => 'oitocentos',
        900 => 'novecentos'
    ];
    public function testCheckResult()
    {
        $this->assertInternalType('int', 2);
    }

    public function testNumDec(){
        $this->assertArrayHasKey( 3, $this->_unidades );
    }

    public function testConversionNumber() {
        $this->assertEquals( strlen("um"), strlen( $this->_unidades[1] ) );
        $this->assertEquals( strlen("dois"), strlen( $this->_unidades[2] ) );
        $this->assertEquals( strlen("tres"), strlen( $this->_unidades[3] ) );
    }

    public function testMultiplosDeDez() {
        $this->assertArrayHasKey( 14, $this->_dezenas_dez );
    }

    public function testDezenas() {
        $this->assertArrayHasKey( 20, $this->_dezenas );
    }

    public function testCentenas() {
        $this->assertArrayHasKey( 200, $this->_centenas );
    }

    public function testNumero() {
        $number = (string) 300;
        $array = [1 => $this->_unidades, 2 => $this->_dezenas, 3 => $this->_centenas];

        if( $number >= 100 ) {
            $valor = $number[0];
            $valor_dezena = $number[1];
            $valor_unidade = $number[2];
        }

        if( $number < 100 && $number > 9 ) {
            $valor = 0;
            $valor_dezena = $number[0];
            $valor_unidade = $number[1];
        }

        if( $number < 10 ) {
            $valor = 0;
            $valor_dezena = 0;
            $valor_unidade = $number[0];
        }

        print_r( array( $valor, $valor_dezena, $valor_unidade));

        $valor = str_pad($valor, strlen($number), "0");
        $valor_dezena = str_pad($valor_dezena, strlen($number)-1, "0");

        $valor = (int) $valor;
        $valor_dezena = (int) $valor_dezena;
        $valor_unidade = (int) $valor_unidade;

         $this->assertEquals("",$array[3][$valor]);
         $this->assertEquals("trinta",$array[1][$valor_dezena]);
         $this->assertEquals("",$array[0][$valor_unidade]);

        // $this->assertEquals( "trezentos", $calculadora->converterString( 300 ) );
    }


}