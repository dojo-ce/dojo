<?php

namespace Test;

require 'vendor/autoload.php';

use PHPUnit_Framework_TestCase as PHPUnit;
use App\Jokenpo;

class JokenpoTest extends PHPUnit
{
	/**
	 * Objeto da classe testada
	 *
	 * @var object
	 */
	private $instance;

	public function testJogada()
	{
		$jogada = $this->instance->jogada();

		$this->assertContains($jogada, $this->instance->getPlays());
	}

	public function testTwice()
	{
		$this->assertTrue($this->instance->checkEquals("pedra", "pedra"));
		$this->assertTrue($this->instance->checkEquals("tesoura", "tesoura"));
		$this->assertTrue($this->instance->checkEquals("papel", "papel"));
	}

	public function testWinner()
	{
		$possibilities = [
			$this->instance->jogada(),
			$this->instance->jogada()
		];

		$this->assertInternalType('boolean', $this->instance->getWinner($possibilities));
	}

	public function testGame()
	{
		$player_one = $this->instance->jogada();
		$player_two = $this->instance->jogada();

		$this->assertInternalType('string', $this->instance->game($player_one, $player_two));
		$this->assertNotFalse($this->instance->game($player_one, $player_two));
	}

	/**
	 * Inicializa os testes
	 *
	 * @return void
	 */
	public function setUp()
	{
		$Jokenpo = new Jokenpo();
		$this->instance = $Jokenpo;
	}
}
