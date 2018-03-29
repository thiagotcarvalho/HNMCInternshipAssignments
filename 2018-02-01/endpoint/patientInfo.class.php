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
	    	// $this->processedData = json_encode($patientArray);
	    	$this->processedData = $patientArray;
    	}
    }

    // Returns the organized data
    public function getProcessedData()
    {
    	return json_encode($this->processedData);
    }

    public function getTreatmentData($treatmentName = null)
    {
    	if (is_null($treatmentName)) {
    		return $this->processedData['Patient']['Treatments'];
    	} elseif (isset($this->processedData['Patient']['Treatments'][$treatmentName])) {
    		return $this->processedData['Patient']['Treatments'][$treatmentName];
    	} else {
    		throw new Exception("Treatment type not recognized");
    	}
    }

    public function getPaymentData($treatmentName = null)
    {
        if (is_null($treatmentName)) {
            foreach ($this->processedData['Patient']['Treatments'] as $treatName => $treatInfo) {
               $paymentData[$treatName]['Payments'] = $treatInfo; 
            }
            return $paymentData;
        } elseif (isset($this->processedData['Patient']['Treatments'][$treatmentName])) {
            return $this->processedData['Patient']['Treatments'][$treatmentName]['Payments'];
        } else {
            throw new Exception("Treatment type not recognized");
        }
    }
}

// Sets up a new OBJECT
$newPatient = new patientInfo();

$newPatient->setSourceData($UnknownTable);
$newPatient->doProcessData();

// echo $newPatient->getProcessedData();