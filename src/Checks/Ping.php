<?php

namespace ApiChecker\Checks;

use ApiChecker\CheckInterface;
use GuzzleHttp\Client;
use \GuzzleHttp\Message\Request;

/**
 * Class to check whether one or more urls respond
 */
class Ping implements CheckInterface
{

	private $requests;

	public function __construct(array $requests)
	{
		$this->requests = $requests;
	}

	private function checkUrls(Client $client)
	{
		$results = [];
		foreach ($this->requests as $request) {
			$results[] = $this->pingcheck($client, $request);
		}
		return $results;
	}

	private function pingcheck(Client $client, Request $request)
	{
		try {
			return $client->send($request);
		} catch (\Exception $e) {
			var_dump($e);
		}
	}

	public function run(Client $client)
	{
		return $this->checkUrls($client);
	}

}
