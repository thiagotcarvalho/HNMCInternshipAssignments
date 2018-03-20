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
$response = [
	'status' => 'ok',
	'data' => null,
	'message' => 'Success'
];
// $treatmentData = null;
$name = null;
if (isset($_GET['name'])) {
	$name = $_GET['name'];
}

try {
	/**
	* Checks to see if $name is valid 
	* in order to add correct data to $response
	* (Does this in patientInfo.class.php from lines 56-65)
	* If invalid $name, then throws Exception to line 34
	*/
	$response['data'] = $newPatient->getTreatmentData($name);
} catch (Exception $e) {
	// echo "ERROR: " .$e->getMessage();
	$response['status'] = 'error';
	$response['message'] = 'Failure';
}
header('Content-Type: application/json');
echo json_encode($response);