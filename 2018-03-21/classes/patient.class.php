<?php
/**
* Creates new patients and stores patient information.
*
* @author Thiago Carvalho <carvalho@holyname.org>
*/

/**
* This class creates new Patients and gets their first name, last name,
* date of birth, weight, height and calculates the Patient's BMI.
* DOB is in the format YYYY-mm-dd, and the weight and height are in pounds and inches, respectively.
*
* @category Patient
* @package PatientBMI
* @author Thiago Carvalho
* @copyright 2018 Holy Name Medical Center
* @license http://www.php.net/license/3_01.txt PHP License 3.01
* @version 1.0
*/
class Patient
{
	/**
	* @access private
	* @var string
	* @var int
	*/
	private $_firstName = null;
	private $_lastName = null;
	private $_zipCode = null;
	private $_dob = null;
	private $_weight = null;
	private $_height = null;
	private $_bmi = null;

	/**
	* This method is initiated when a new object is created
	*
	* @access public
	* @param string $firstName the first name of the patient
	* @param string $dob 	   the date of birth of the patient
	* @return void
	*/
	public function __construct($firstName, $dob, $zipCode)
	{
		$this->firstName = $firstName;
		$this->dob = $dob;
		$this->zipCode = $zipCode;
	}

	/**
	* This method returns the patient's first name
	*
	* @access public
	* @return string the first name of the patient
	*/
	public function getFirstName()
	{
		return $this->firstName;
	}

	/**
	* This method sets the patient's last name
	*
	* @access public
	* @param string $lastName the last name of the patient
	* @return void
	*/
	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	/**
	* This method returns the patient's last name
	*
	* @access public
	* @return string the last name of the patient
	*/
	public function getLastName()
	{
		return $this->lastName;
	}

	/**
	* This method returns the patient's date of birth
	*
	* @access public
	* @return string the last name of the patient
	*/
	public function getDOB()
	{
		return $this->dob;
	}

	/**
	* This method returns the patient's zip code
	*
	* @access public
	* @return string the zip code of the patient
	*/
	public function getZipCode()
	{
		return $this->zipCode;
	}

	/**
	* This method sets the patient's weight
	*
	* @access public
	* @param int $weight the weight of the patient
	* @return void
	*/
	public function setWeight($weight)
	{
		$this->weight = $weight;
	}

	/**
	* This method returns the patient's weight
	*
	* @access public
	* @return int the weight of the patient
	*/
	public function getWeight()
	{
		return $this->weight;
	}

	/**
	* This method sets the patient's height
	*
	* @access public
	* @param string $height the height of the patient
	* @return void
	*/
	public function setHeight($height)
	{
		$this->height = $height;
	}

	/**
	* This method returns the height of the patient
	*
	* @access public
	* @return int the weight of the patient
	*/
	public function getHeight()
	{
		return $this->height;
	}

	/**
	* This method converts the weight of the patient to kilograms
	*
	* @access public
	* @param int $lbs the weight of the patient
	* @return int the weight of the patient in kilograms
	*/
	public function getMetricWeight($lbs)
	{
		return $this->weight * 0.45;
	}

	/**
	* This methods converts the height of the patient to meters
	*
	* @access public
	* @param int $inches the height of the patient
	* @return int the height of the patient in meters
	*/
	public function getMetricHeight($inches)
	{
		return $this->height * 0.025;
	}

	/**
	* This method checks to see if the BMI is null,
	* if it is, it calls calculateBMI() to find the patient's BMI,
	* and finally, it sets that value to $bmi.
	*
	* @access public
	* @return int the bmi of the patient
	*/
	public function getBMI()
	{
		if (is_null($this->_bmi)) {
			return $this->_bmi = $this->calculateBMI();
		}
	}

	/**
	* This method calculates the BMI of the patient by
	* diving the patient's weight in kilograms to the patient's height in meter.
	*
	* @access public
	* @return int the calculated bmi of the patient
	*/
	public function calculateBMI()
	{
		return $this->getMetricWeight($this->weight) / ($this->getMetricHeight($this->height) ** 2);
	}
}