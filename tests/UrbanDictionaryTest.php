<?php 

use Alex\UrbanDictionary;
use Alex\Datastore;

class UrbanDictionaryTest extends PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		Datastore::$data = [
			"Tight" => [
				"description" => "When someone performs an awesome task",
				"sample-sentence" => "Andrei: Prosper, Have you finished the curriculum?. \nProsper: Yes.\nAndrei: Tight,Tight,Tight!!!"
			]
		];
	}

	public function testRetrieve()
	{
		$dictionary = new UrbanDictionary();
		$expected = [
			"description" => "When someone performs an awesome task",
			"sample-sentence" => "Andrei: Prosper, Have you finished the curriculum?. \nProsper: Yes.\nAndrei: Tight,Tight,Tight!!!"
		];

		$result = $dictionary->retrieve("Tight");

		$this->assertEquals($result, $expected);
	}

	public function testAdd()
	{
		$dictionary = new UrbanDictionary();	
		$result = $dictionary->add("Dope",
			[
				"description" => "When someone performs an awesome task",
				"sample-sentence" => "Andrei: Prosper, Have you finished the curriculum?. \nProsper: Yes.\nAndrei: Dope,Dope,Dope!!!"
			]
		);
		$this->assertEquals($result, 
			[
				"Tight" => [
					"description" => "When someone performs an awesome task",
					"sample-sentence" => "Andrei: Prosper, Have you finished the curriculum?. \nProsper: Yes.\nAndrei: Tight,Tight,Tight!!!"
				],
				"Dope" =>
				[
					"description" => "When someone performs an awesome task",
					"sample-sentence" => "Andrei: Prosper, Have you finished the curriculum?. \nProsper: Yes.\nAndrei: Dope,Dope,Dope!!!"
				]
			]
		);
	}

	public function testDelete()
	{
		$dictionary = new UrbanDictionary();
		$result = $dictionary->delete("Tight");
		$this->assertEquals($result, []);
	}

	public function testUpdate()
	{
		$dictionary = new UrbanDictionary();
		$result = $dictionary->update("Tight",
			[
				"description" => "When someone performs an horrible task",
				"sample-sentence" => "Andrei: Prosper, Have you finished the curriculum?. \nProsper: Yes.\nAndrei: Tight,Tight,Tight!!!"
			]
		);
		$this->assertEquals($result,
			[
				"Tight" => [
					"description" => "When someone performs an horrible task",
					"sample-sentence" => "Andrei: Prosper, Have you finished the curriculum?. \nProsper: Yes.\nAndrei: Tight,Tight,Tight!!!"
				]
			]
		);

	}
}
