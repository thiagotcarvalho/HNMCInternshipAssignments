<?php
require 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-02-01\endpoint\patient-data.source.php';

class patientInfo
{
	private $sourceData;
	private $processedData;

	// Sets the object to the specific value
	public function setSourceData($information) {
		$this->sourceData = $information;
	}

	// Returns the (new) value of the object
	public function getSourceData() {
    	return $this->sourceData;
    }
}

$patientArray = new patientInfo();
$patientArray->setSourceData($UnknownTable);
$patientArray->getSourceData();
// $foo->setBar($foo->getBar() + 1);

echo "<pre>";
print_r($patientArray);


// class patientInfo
// {
// 	private $sourceData;
// 	private $processedData;

// 	// $attributes is the array holding the patient information
// 	public function __construct($information = array()) {
// 		foreach ($information as $key => $value) {
// 			$this->$key = $value;
// 		}
// 	}

// 	function setSourceData($name, $value) {
// 		if(method_exists($this, $name)) {
// 			$this->$name($value);
// 		}
// 		else {
// 			$this->$name = $value;
// 		}
// 	}

// 	function getSourceData($name) {
// 		if(method_exists($this, $name)) {
// 			return $this->$name();
// 		}
// 		elseif(property_exists($this, $name)) {
// 			return $this->name;
// 		}
// 		return null;
// 	}
// }