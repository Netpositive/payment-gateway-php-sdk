<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;

class Result extends SimpleRequestAbstract
{
	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_RESULT;
	}
}