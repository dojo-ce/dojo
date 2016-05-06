<?php

namespace Test;

require 'vendor/autoload.php';

use PHPUnit_Framework_TestCase as PHPUnit;
use App\FizzBuzz;

class FizzBuzzTest extends PHPUnit
{
	/**
	 * Objeto da classe testada
	 *
	 * @var object
	 */
	private $instance;

	/**
	 * Teste range 0 a 100
	 *
	 * @return boolean
	 */
	public function testStart()
	{
		return $this->assertEquals(count($this->instance->getSequence()), 100);
	}

	/**
	 * Testa a troca dos divisores por 3 pela palavra Fizz
	 *
	 * @return boolean
	 */
	public function testDividersThree()
	{
		$sequence = $this->instance->make();
		$countFizzSpec = 27;

		$fizzStuff = array_filter($sequence, function($value) {
			return ($value == 'Fizz');
		});

		return $this->assertEquals($countFizzSpec, count($fizzStuff));
	}

	/**
	 * Testa a troca dos divisores por 5 pela palavra Buzz
	 *
	 * @return boolean
	 */
	public function testDividersFive()
	{
		$sequence = $this->instance->make();
		$countBuzzSpec = 13;

		$buzzStuff = array_filter($sequence, function($value) {
			return ($value == 'Buzz');
		});

		return $this->assertEquals($countBuzzSpec, count($buzzStuff));
	}

	/**
	 * Testa a troca dos divisores de 3 e 5 pela palavra FizzBuzz
	 *
	 * @return boolean
	 */
	public function testDividersThreeAndFive()
	{
		$sequence = $this->instance->make();
		$countFizzBuzzSpec = 7;

		$fizzBuzzStuff = array_filter($sequence, function($value) {
			return ($value == 'FizzBuzz');
		});

		return $this->assertEquals($countFizzBuzzSpec, count($fizzBuzzStuff));
	}

	/**
	 * Testa o tipo do retorno do resultado
	 *
	 * @return boolean
	 */
	public function testResult()
	{
		$result = $this->instance->result();

		return $this->assertEquals(true, is_string($result));
	}

	/**
	 * Inicializa os testes
	 *
	 * @return void
	 */
	public function setUp()
	{
		$FizzBuzz = new FizzBuzz();
		$this->instance = $FizzBuzz;
	}
}
