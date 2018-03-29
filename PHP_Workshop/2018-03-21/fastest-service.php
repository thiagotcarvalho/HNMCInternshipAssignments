<?php
require_once 'C:\xampp\htdocs\thiago\hnmc_assignments\PHP_Workshop\2018-03-21\classes\hospital.class.php';

$patients = [
	[
		'firstName' => 'John',
		'lastName'  => 'Smith',
		'DOB'       => '06/01/65',
		'zipCode'   => '07666',
		'weight'    => 200,
		'height'    => 68
	],

	[
		'firstName' => 'Mary',
		'lastName'  => 'Orlandez',
		'DOB'       => '12/30/93',
		'zipCode'   => '07560',
		'weight'    => 120,
		'height'    => 60
	],

	[
		'firstName' => 'Michael',
		'lastName'  => 'Scott',
		'DOB'       => '08/16/62',
		'zipCode'   => '07430',
		'weight'    => 175,
		'height'    => 71
	],
];

foreach ($patients as $patientInfo) {
	echo $patientInfo['firstName'];
}

echo "<pre>";
print_r($patients);

try {
	$new = new Hospital('07032', true);
} catch (Exception $e) {
	echo "<b>ERROR</b>: " .$e->getMessage();
}