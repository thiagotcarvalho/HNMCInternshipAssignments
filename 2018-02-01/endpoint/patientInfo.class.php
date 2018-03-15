<?php
require 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-02-01\endpoint\patient-data.source.php';

class patientInfo
{
	private $sourceData = NULL;
	private $processedData;

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
    public function doProcessData()
    {
    	if (is_null($this->sourceData)) {
    		echo "ERROR! Cannot continue because no data has been set.";
    	}
    	else {
    		// Loops through the given array
	    	foreach ($this->sourceData as $patientInfo) {
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
	    	}// End of Loop

	    	$this->processedData = json_encode($patientArray);
    	}
    }

    // Returns the organized data
    public function getProcessedData()
    {
    	return $this->processedData;
    }
}

// Sets up a new OBJECT
$newPatient = new patientInfo();

$newPatient->setSourceData($UnknownTable);
$newPatient->doProcessData();

// echo "<pre>";
// print_r($newPatient->getProcessedData());

// header("Content-Type: application/json; charset=UTF-8");
echo $newPatient->getProcessedData();