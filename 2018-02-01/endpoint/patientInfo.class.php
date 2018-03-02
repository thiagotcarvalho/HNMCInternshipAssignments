<?php
require 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-02-01\endpoint\patient-data.source.php';

class patientInfo
{
	private $sourceData;
	private $processedData;
	private $treatmentData;
	private $paymentData = [];

	// Sets the object to the specific value
	public function setSourceData($passedSourceData)
	{
		$this->sourceData = $passedSourceData;
	}

	// Returns the (new) value of the object
	public function getSourceData()
	{
    	return $this->sourceData;
    }

    // Organizes the source data
    public function doProcessData($passedSourceData)
    {
    	// Loops through the given array
    	foreach ($passedSourceData as $patientInfo) {
    		$patientArray['Patient']['id'] = $patientInfo['patientId'];
			$patientArray['Patient']['firstName'] = $patientInfo['firstName'];
			$patientArray['Patient']['lastName'] = $patientInfo['lastName'];

			$patientArray['Patient']['Treatments'][$patientInfo['treatmentName']]['treatmentName'] = $patientInfo['treatmentName'];
			$patientArray['Patient']['Treatments'][$patientInfo['treatmentName']]['treatmentCost'] = $patientInfo['treatmentCost'];
			$patientArray['Patient']['Treatments'][$patientInfo['treatmentName']]['treatmentDate'] = $patientInfo['treatmentDate'];

			$patientArray['Patient']['Treatments'][$patientInfo['treatmentName']]['Payments'][] =
				[
					'paymentId' => $patientInfo['paymentId'],
					'paymentDate' => $patientInfo['paymentDate'],
					'amount' => $patientInfo['paymentAmount']
				];

			// Saves all Payment-related data
			// Must stay within the loop
			$this->paymentData[$patientInfo['treatmentName']] = $patientArray['Patient']['Treatments'][$patientInfo['treatmentName']]['Payments'];

    	}// End of Loop

    	$this->processedData = $patientArray;
    	$this->treatmentData = $patientArray['Patient']['Treatments'];
    }

    // Returns the organized data
    public function getProcessedData()
    {
    	return $this->processedData;
    }

    public function getTreatmentData()
    {
    	return $this->treatmentData;
    }

    public function getPaymentData()
    {
    	return $this->paymentData;
    }
}

// Sets up a new OBJECT
$newPatient = new patientInfo();

$newPatient->setSourceData($UnknownTable);
$newPatient->getSourceData();

$newPatient->doProcessData($UnknownTable);
$newPatient->getProcessedData();

$newPatient->getTreatmentData();
$newPatient->getPaymentData();

echo "<pre>";
print_r($newPatient);