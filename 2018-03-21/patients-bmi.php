<<<<<<< HEAD
<?php
/**
* patients-bmi.php
*
* Puts Patient information into an HTML table
* @author Thiago Carvalho <carvalho@holyname.org>
* @version 1.2
*/
require_once 'C:\xampp\htdocs\thiago\hnmc_assignments\PHP_Workshop\2018-03-21\classes\patient.class.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Information</title>
	<meta charset="utf-8">
	<style>
		table {
			margin: auto;
			margin-top: 50px;
		}
		table, th, td {
			border: 1px solid black;
		}
		th, td {
			padding: 5px;
		}
		td {
			text-align: center;
		}
	</style>
</head>
<body>

	<div id="container">

		<table style="width: 35%">
			<tr>
				<th colspan="3">Patient Weight and Height</th>
			</tr>
			<tr>
				<td></td>
				<td><b>Weight</b></td>
				<td><b>Height</b></td>
			</tr>
			<tr>
				<td><b>Imperial</b></td>
				<td><?php echo $John->getWeight(). "lbs" ?></td>
				<td><?php echo $John->getHeight(). "in" ?></td>
			</tr>
			<tr>
				<td><b>Metric</b></td>
				<td><?php echo $John->getMetricWeight($John->getWeight()). "kg" ?></td>
				<td><?php echo $John->getMetricHeight($John->getHeight()). "m" ?></td>
			</tr>
			<tr>
				<th colspan="3">Patient BMI</th>
			</tr>
			<tr>
				<td><b>BMI</b></td>
				<td><?php echo $John->getBMI(); ?></td>
				<td></td>
			</tr>
		</table>

	</div>

</body>
=======
<?php
/**
* patients-bmi.php
*
* Puts Patient information into an HTML table
* @author Thiago Carvalho <carvalho@holyname.org>
* @version 1.2
*/
require_once 'C:\xampp\htdocs\thiago\hnmc_assignments\PHP_Workshop\2018-03-21\classes\patient.class.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Information</title>
	<meta charset="utf-8">
	<style>
		table {
			margin: auto;
			margin-top: 50px;
		}
		table, th, td {
			border: 1px solid black;
		}
		th, td {
			padding: 5px;
		}
		td {
			text-align: center;
		}
	</style>
</head>
<body>

	<div id="container">

		<table style="width: 35%">
			<tr>
				<th colspan="3">Patient Weight and Height</th>
			</tr>
			<tr>
				<td></td>
				<td><b>Weight</b></td>
				<td><b>Height</b></td>
			</tr>
			<tr>
				<td><b>Imperial</b></td>
				<td><?php echo $John->getWeight(). "lbs" ?></td>
				<td><?php echo $John->getHeight(). "in" ?></td>
			</tr>
			<tr>
				<td><b>Metric</b></td>
				<td><?php echo $John->getMetricWeight($John->getWeight()). "kg" ?></td>
				<td><?php echo $John->getMetricHeight($John->getHeight()). "m" ?></td>
			</tr>
			<tr>
				<th colspan="3">Patient BMI</th>
			</tr>
			<tr>
				<td><b>BMI</b></td>
				<td><?php echo $John->getBMI(); ?></td>
				<td></td>
			</tr>
		</table>

	</div>

</body>
>>>>>>> 0e2eb62793dd656029353b398ce54751bb632218
</html>