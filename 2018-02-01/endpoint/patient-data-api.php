<?php
require 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-02-01\endpoint\patient-data.source.php';

/* Looping through Array */
foreach ($UnknownTable as $rowNum => $patientInfo) {
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
} /* End of loop */

$response = [
	'status' => 'ok',
	'message' => ' ',
	'code' => 200,
	'data' => $patientArray
];

header("Content-Type: application/json; charset=UTF-8");

$patientDataJSON = json_encode($patientArray);
echo $patientDataJSON;