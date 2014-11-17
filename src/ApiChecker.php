<?php

namespace ApiChecker;

use \GuzzleHttp\Client;
class ApiChecker
{
	private $guzzle;

	private $checks = [];

	public function __construct(Client $guzzle, array $checks = [])
	{
		array_map([$this, 'registerCheck'], $checks);
		$this->setGuzzleClient($guzzle);
	}

	public function setGuzzleClient(Client $client)
	{
		$this->guzzle = $client;
	}

	public function getGuzzleClient()
	{
		return $this->guzzle;
	}

	public function registerCheck(CheckInterface $check)
	{
		$this->checks[] = $check;
	}

	public function run()
	{
		foreach ($this->checks as $check) {
			$results[] = $check->run($this->guzzle);
		}

		return $results;
	}

}
