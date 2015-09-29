<?php 
namespace Alex;

/**
* This code counts the word occurence instance
* in the sample-sentence and throws an error if there is
* no sample-sentence
*
* @author Alex Kangethe
*/

class Ranking
{	
	public $word;

	public function __construct($word)
	{
		$this->word = $word;
	}

	public function rate()
	{
		if (isset($this->word["sample-sentence"])) {
			$sentence = array_count_values(str_word_count($this->word["sample-sentence"], 1));
			return $sentence;
		} else {
			throw new Exception("There is no sample sentence provided");
			
		}
	}
}
