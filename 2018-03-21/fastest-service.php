<<<<<<< HEAD
<?php
/**
* Finds the closest hospital for each patient by calculating distance between
* hospitals' zip code and the patients'.
*
* @author Thiago Carvalho <carvalho@holyname.org>
*/
require_once 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-03-21\classes\patient.class.php';
require_once 'C:\xampp\htdocs\thiago\hnmc_assignments\2018-03-21\classes\hospital.class.php';

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
		'zipCode'   => '07032',
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

$hospitals = [
	[
		'zipCode' => '07666',
		'traumaRoom' => true,
		'address' => '718 Teaneck Rd, Teaneck, New Jersey',
		'phoneNumber' => '2018333000',
		'numberOfBeds' => 80,
		'numberOfBedsAvailable' => 38
	],

	[
		'zipCode' => '07601',
		'traumaRoom' => false,
		'address' => '30 Prospect Ave, Hackensack, New Jersey',
		'phoneNumber' => '5519962000',
		'numberOfBeds' => 39,
		'numberOfBedsAvailable' => 13
	],

	[
		'zipCode' => '10901',
		'traumaRoom' => true,
		'address' => '55 Lafayette Ave, Suffern, New York',
		'phoneNumber' => '8453685000',
		'numberOfBeds' => 50,
		'numberOfBedsAvailable' => 23
	],
];

/**
* Keeps count of how many hospitals there are
* and creates new Hospital object 
* (using their specific zip code and if the trauma room is available or not)
*/
$hospitalCount = 0;
foreach ($hospitals as $hospitalInfo) {
	try {
		$newHospital[$hospitalCount] = new Hospital($hospitalInfo['zipCode'], $hospitalInfo['traumaRoom']);
		$newHospital[$hospitalCount]->setAddress($hospitalInfo['address']);
		$newHospital[$hospitalCount]->setPhoneNumber($hospitalInfo['phoneNumber']);
		$newHospital[$hospitalCount]->setNumberOfBeds($hospitalInfo['numberOfBeds']);
		$newHospital[$hospitalCount]->setNumberOfAvailableBeds($hospitalInfo['numberOfBedsAvailable']);
	} catch (Exception $e) {
		echo "<b>ERROR</b>: " .$e->getMessage();
	}
	$hospitalCount++;
}

/**
* Keeps count of how many patients there are
* and creates new objects by using their specific name, dob, and zip code
*/
$patientCount = 0;
foreach ($patients as $patientInfo) {
	$newPatient[$patientCount] = new Patient($patientInfo['firstName'], $patientInfo['DOB'], $patientInfo['zipCode']);
	$newPatient[$patientCount]->setLastName($patientInfo['lastName']);
	$newPatient[$patientCount]->setWeight($patientInfo['weight']);
	$newPatient[$patientCount]->setHeight($patientInfo['height']);
	$patientCount++;
}

$arrContextOptions = [
    "ssl"=> [
		"verify_peer" => false,
		"verify_peer_name" => false,
    ],
];  

$html = '<table><tr><th>Patient Name</th><th colspan="2" style="text-align: center">Nearest Hospital</th></tr>';
for ($i = 0; $i < $patientCount; $i++) {
	$distanceFromHospital[$i] = 0;
	for ($j=0; $j < $hospitalCount; $j++) { 
		$dst = file_get_contents('https://www.zipcodeapi.com/rest/VFkGlNc1HiP8D2iIgHoDzW5yAVdn3mXtl3r0wzKsFI53mBiaXSMYqt553zaS0Pcj/distance.json/' .$newPatient[$i]->getZipCode(). '/' .$newHospital[$j]->getZipCode(). '/mile', false, stream_context_create($arrContextOptions));

		foreach (json_decode($dst) as $key => $value) {
			if ($distanceFromHospital[$i] == 0) {
				$distanceFromHospital[$i] = $value;
				$closestHospitalZip = $newHospital[$j]->getZipCode();
				$closestHospitalAddress = $newHospital[$j]->getAddress();
			} elseif ($distanceFromHospital[$i] > $value) {
				$distanceFromHospital[$i] = $value;
				$closestHospitalZip = $newHospital[$j]->getZipCode();
				$closestHospitalAddress = $newHospital[$j]->getAddress();
			}
		}
	}
	$html .= '<tr><td>' .$newPatient[$i]->getFirstName(). ' ' .$newPatient[$i]->getLastName(). '</td><td>' .$closestHospitalAddress. ' ' .$closestHospitalZip. '</td><td>'
			 .$distanceFromHospital[$i]. ' miles</td></tr>';
}
$html .= '</table>';
echo $html;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Distances</title>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th, td {
		    padding: 5px;
		    text-align: left;    
		}
	</style>
</head>
</html>
=======
<<<<<<< HEAD
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
=======
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
>>>>>>> 71214b45d6c6c8c463b0bee0438f6b935fc8adf0
}
>>>>>>> 0e2eb62793dd656029353b398ce54751bb632218
