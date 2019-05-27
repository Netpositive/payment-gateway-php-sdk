<?php

namespace BigFish\Tests\PaymentGateway\Request;


use BigFish\PaymentGateway\Request\Details;
use BigFish\PaymentGateway\Request\RequestInterface;

class DetailsTest extends SimpleTransactionRequestAbstract
{
	protected function getRequest(string $transactionId): RequestInterface
	{
		return new Details($transactionId, false);
	}

	protected function getDataKeys(): array
	{
		$result = parent::getDataKeys();
		$result['getRelatedTransactions'] = false;
		return $result;
	}
}
