<?php

namespace BigFish\PaymentGateway\Request;

use BigFish\PaymentGateway;
use BigFish\PaymentGateway\Exception\PaymentGatewayException;

class Settlement extends InitBasicAbstract
{
	const MAX_LIMIT = 1000;

	public function __construct()
	{
		parent::__construct();
		$this->setGetItems(true);
	}

	/**
	 * @var array
	 */
	protected $maxLength = [
		'storeName' => 20,
		'providerName' => 20,
		'terminalId' => 64,
		'settlementDate' => 10,
		'transferNotice' => 255,
		'transactionCurrency' => 3
	];

	/**
	 * @param int $limit
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setLimit(int $limit = 250): self
	{
		if ($limit > Settlement::MAX_LIMIT) {
			throw new PaymentGatewayException('Invalid limit');
		}

		return $this->setData($limit, 'limit');
	}

	/**
	 * @param int $offset
	 * @return $this
	 * @throws PaymentGatewayException
	 */
	public function setOffset(int $offset): self
	{
		return $this->setData($offset, 'offset');
	}

	/**
	 * @param bool $value
	 * @return $this
	 */
	public function setGetItems(bool $value = true): self
	{
		return $this->setData($value, 'getItems');
	}

	/**
	 * @param bool $value
	 * @return $this
	 */
	public function setGetBatches(bool $value = true): self
	{
		return $this->setData($value, 'getBatches');
	}

	/**
	 * @param string $transferNotice
	 * @return $this
	 */
	public function setTransferNotice(string $transferNotice): self
	{
		return $this->setData($transferNotice, 'transferNotice');
	}

	/**
	 * @param string $date
	 * @return $this
	 */
	public function setSettlementDate(string $date): self
	{
		return $this->setData($date, 'settlementDate');
	}

	/**
	 * @param string $terminalId
	 * @return $this
	 */
	public function setTerminalId(string $terminalId): self
	{
		return $this->setData($terminalId, 'terminalId');
	}

	/**
	 * Set settlement transaction currency
	 *
	 * @param string $currency Three-letter ISO currency code (e.g. HUF, USD etc.)
	 * @return $this
	 */
	public function setTransactionCurrency(string $currency = ''): self
	{
		if (!$currency) {
			$currency = PaymentGateway\Config::DEFAULT_CURRENCY;
		}
		return $this->setData($currency, 'transactionCurrency');
	}

	/**
	 * @return string
	 */
	public function getMethod(): string
	{
		return PaymentGateway::REQUEST_SETTLEMENT;
	}
}
