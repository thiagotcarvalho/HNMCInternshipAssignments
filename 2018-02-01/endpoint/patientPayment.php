<?php

require_once 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-02-01\endpoint\patientInfo.class.php';

// $name = null;
// if (isset($_GET['name'])) {
// 	$name = $_GET['name'];
// }
// echo "<pre>";
// print_r($newPatient->getPaymentData($name));

$response = [
	'status' => 'ok',
	'data' => null,
	'message' => 'Success'
];

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
	$response['data'] = $newPatient->getPaymentData($name);
} catch (Exception $e) {
	// echo "ERROR: " .$e->getMessage();
	$response['status'] = 'error';
	$response['message'] = 'Failure';
}
header('Content-Type: application/json');
echo json_encode($response);
