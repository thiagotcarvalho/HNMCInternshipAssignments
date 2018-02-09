<?php

$hnmcPatients = [
	 0 => [
		'firstName' => 'John',
		'lastName' => 'Smith',
		'DOB' => '1990-01-13'
	],
	1 => [
		'firstName' => 'Mary',
		'lastName' => 'Pulaski',
		'DOB' => '1980-01-14'
	],
	2 => [
		'firstName' => 'Dan',
		'lastName' => 'Hoffman',
		'DOB' => '1970-01-15'
	],
];

foreach($hnmcPatients as $patientNum => $patient_info) {
	foreach($patient_info as $information => $value) {
		if($information == 'firstName') {
			$firstName = $value;
		}
		elseif($information == 'lastName') {
			$lastName = $value;
		}
		else {
			break;
		}
	}
	echo "$firstName $lastName <br>";
}