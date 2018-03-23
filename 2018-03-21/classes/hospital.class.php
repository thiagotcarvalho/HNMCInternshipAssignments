<?php

class Hospital
{
	private $zipCode = null;
	private $traumaRoom = null;
	private $address = null;
	private $phoneNumber = null;
	private $numberOfBeds = null;
	private $numberOfAvailableBeds = null;

	public function __construct($zipCode, $traumaRoom = false)
	{
		$this->zipCode = $zipCode;
		if (!(is_bool($traumaRoom))) {
			throw new Exception("traumaRoom has to be a boolean value");
		}
	}

	public function getZipCode()
	{
		return $this->zipCode;
	}

	public function getTraumaRoom()
	{
		return $this->getTraumaRoom;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function setPhoneNumber($phoneNumber)
	{
		$this->phoneNumber = $phoneNumber;
	}

	public function getPhoneNumber()
	{
		return $this->phoneNumber;
	}

	public function setNumberOfBeds($numOfBeds)
	{
		$this->numberOfBeds = $numOfBeds;
	}

	public function getNumberOfBeds()
	{
		return $this->numberOfBeds;
	}

	public function setNumberOfAvailableBeds($numOfAvailBeds)
	{
		$this->numberOfAvailableBeds = $numOfAvailBeds;
	}

	public function getNumberOfAvailableBeds()
	{
		return $this->numberOfAvailableBeds;
	}
}