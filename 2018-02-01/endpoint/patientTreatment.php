<?php
/**
* patientTreatment.php
*
* Only extracts the treatment data from the patient information in patientInfo.class.php.
* @author Thiago Carvalho <carvalho@holyname.org>
* @version 1.2
*/
require_once 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-02-01\endpoint\patientInfo.class.php';

/** 
* Check to see if correct treatment name is passed to URL
* Then sets a variable to either true or false to show proper response
*/
$name = null;
if (isset($_GET['name'])) {
	$name = $_GET['name'];
}

try {
	$treatmentData = $newPatient->getTreatmentData($name);
	$response = [
		'status' => 'ok',
		'data' => $treatmentData,
		'message' => 'Success'
	];
} catch (Exception $e) {
	// echo "ERROR: " .$e->getMessage();
	$response = [
		'status' => 'error',
		'data' => null,
		'message' => 'Failure'
	];
}
header('Content-Type: application/json');
echo json_encode($response);
// echo getResponse($treatmentData, $resp);

/**
* Indicates response of code
*/
/*function getResponse($data, $resp)
{
	if ($resp == true) {
		$response = [
			'status' => 'ok',
			'data' => $data,
			'message' => 'Success'
		];
	} else {
		$response = [
			'status' => 'error',
			'data' => null,
			'message' => 'Failure'
		];
	}
	return json_encode($response);
}*/