<?php

namespace App;

/**
 * Classe para resolver o desafio Jokenpo.
 *
 * @author Dorian Neto <doriansampaioneto@gmail.com>
 */
class Jokenpo
{
	private $plays = [
		'pedra',
		'tesoura',
		'papel'
	];

	public function getPlays()
	{
		return $this->plays;
	}

	public function checkEquals($player_one, $player_two)
	{
		return $player_one === $player_two ? true : false;
	}

	public function game($player_one, $player_two)
	{
		if ($this->checkEquals($player_one, $player_two)) {
			return 'Houve um empate';
		}

		$possibilities = [
			$player_one,
			$player_two
		];

		$message = 'Jogada: ' . implode(' ', $possibilities);

		if ($this->getWinner($possibilities) > 0) {
			return $message . '. Vitória do jogador 1';
		}

		return $message . '. Vitória do jogador 2';
	}

	public function getWinner($possibilities)
	{
		$array = [
			["pedra", "tesoura"],
			["papel", "pedra"],
			["tesoura", "papel"]
		];

		return in_array($possibilities, $array);
	}

	public function jogada()
	{
		$indice = rand(0,2);
		return $this->plays[$indice];
	}
}

$game = new Jokenpo;
echo $game->game($game->jogada(), $game->jogada());