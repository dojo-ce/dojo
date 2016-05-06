<?php

namespace App;

/**
 * Classe para resolver o desafio FizzBuzz.
 *
 * @author Igor Sousa <igor.ssqwe@gmail.com>
 * @author Alison Monteiro <alisonmonteiro.10@gmail.com>
 * @author Dorian Neto <doriansampaioneto@gmail.com>
 */
class FizzBuzz
{
	/**
	 * Gera a sequência de 0 a 100
	 *
	 * @return array
	 */
	public function getSequence()
	{
		return range(0, 99);
	}

	/**
	 * Gera o array com as substituições
	 *
	 * @return array
	 */
	public function make()
	{
		$sequence = $this->getSequence();

		return array_map(function($value) {
			if ($value%3 === 0 && $value%5 === 0) {
				$value = 'FizzBuzz';
			}else if ($value%3 === 0) {
				$value = 'Fizz';
			} else if ($value%5 === 0) {
				$value = 'Buzz';
			}

			return $value;
		}, $sequence);
	}

	/**
	 * Retorna uma string com a lista de valores esperados
	 *
	 * @return string
	 */
	public function result()
	{
		$output = '';
		$sequence = $this->make();
		foreach ($sequence as $key => $value) {
			$output .= $key . ' - ' . $value;
		}

		return $output;
	}
}
