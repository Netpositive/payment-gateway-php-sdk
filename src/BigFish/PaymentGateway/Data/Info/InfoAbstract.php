<?php

namespace BigFish\PaymentGateway\Data\Info;


use BigFish\PaymentGateway\Common\BaseAbstract;

abstract class InfoAbstract extends BaseAbstract implements InfoInterface
{
	/**
	 * @return null|string
	 */
	public function getStructurePath(): string
	{
		return null;
	}
}
