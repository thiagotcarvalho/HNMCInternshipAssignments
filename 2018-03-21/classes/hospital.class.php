<?php
/**
* Creates new hospitals and stores hospital information.
*
* @author Thiago Carvalho <carvalho@holyname.org>
*/

/**
* This class creates new Hospitals and gets their zip code, whether or not they have a trauma room,
* address, phone number, number of beds and number of availale beds.
*
* @category Hospital
* @package PatientDistance
* @author Thiago Carvalho
* @copyright 2018 Holy Name Medical Center
* @license http://www.php.net/license/3_01.txt PHP License 3.01
* @version 1.0
*/
class Hospital
{
	/**
	* @access private
	* @var string
	* @var int
	*/
	private $_zipCode = null;
	private $_traumaRoom = null;
	private $_address = null;
	private $_phoneNumber = null;
	private $_numberOfBeds = null;
	private $_numberOfAvailableBeds = null;

	/**
	* This method is initiated when a new object is created.
	* Also checks to make sure value entered for $traumaRoom is bool,
	* if not, it throws an exception.
	*
	* @access public
	* @param string $zipCode 	 the hospital's zip code
	* @param boolean $traumaRoom whether or not a trauma room is available
	* @return void
	*/
	public function __construct($zipCode, $traumaRoom = false)
	{
		$this->zipCode = $zipCode;
		if (!(is_bool($traumaRoom))) {
			throw new Exception("traumaRoom has to be a boolean value");
		}
	}

	/**
	* This method returns the hospitals's zip code
	*
	* @access public
	* @return string the zip code of the hospital
	*/
	public function getZipCode()
	{
		return $this->zipCode;
	}

	/**
	* This method returns whether or not the hospital has a trauma room
	*
	* @access public
	* @return boolean whether or not there exists a trauma room
	*/
	public function getTraumaRoom()
	{
		return $this->getTraumaRoom;
	}

	/**
	* This method sets the hospital's address
	*
	* @access public
	* @param string $address the address of the hospital
	* @return void
	*/
	public function setAddress($address)
	{
		$this->address = $address;
	}

	/**
	* This method returns the address of the hospital
	*
	* @access public
	* @return string the address of the hospital
	*/
	public function getAddress()
	{
		return $this->address;
	}

	/**
	* This method sets the hospital's phone number
	*
	* @access public
	* @param string $phoneNumber the phone number of the hospital
	* @return void
	*/
	public function setPhoneNumber($phoneNumber)
	{
		$this->phoneNumber = $phoneNumber;
	}

	/**
	* This method returns the phone number of the hospital
	*
	* @access public
	* @return string the phone number of the hospital
	*/
	public function getPhoneNumber()
	{
		return $this->phoneNumber;
	}

	/**
	* This method sets the number of beds the hospital has
	*
	* @access public
	* @param int $numOfBeds the number of beds in the hospital
	* @return void
	*/
	public function setNumberOfBeds($numOfBeds)
	{
		$this->numberOfBeds = $numOfBeds;
	}

	/**
	* This method returns the number of beds the hospital has
	*
	* @access public
	* @return int the number of beds in the hospital
	*/
	public function getNumberOfBeds()
	{
		return $this->numberOfBeds;
	}

	/**
	* This method sets the number of beds that the hospital has available
	*
	* @access public
	* @param int $numOfAvailBeds the number of beds available in the hospital
	* @return void
	*/
	public function setNumberOfAvailableBeds($numOfAvailBeds)
	{
		$this->numberOfAvailableBeds = $numOfAvailBeds;
	}

	/**
	* This method returns the number of beds that the hospital has available
	*
	* @access public
	* @return int the number of beds available in the hospital
	*/
	public function getNumberOfAvailableBeds()
	{
		return $this->numberOfAvailableBeds;
	}
}