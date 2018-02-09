<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Patient Data Table</title>
		<link rel="stylesheet" type="text/css" href="CSS/table-style.css">
	</head>
	<body>
		<table style="width:100%">
			<tr>
				<th>ID</th>
			    <th>Patient Name</th>
			    <th>Treatment Name</th>
			    <th>Treatment Cost</th>
			    <th>Amount Paid</th>
			    <th>Balance</th>
			</tr>

		<?php
			$patientTreatmentsPayment = 
			$UnknownTable = [
				[	//row #0
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-11',
					'treatmentName' => 'XRAY',
					'treatmentCost' => 1200.00,
					'paymentId' => 1,
					'paymentDate' => '2018-01-17',
					'paymentAmount' => 250.00,
				],
				[ 	//row #1
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-11',
					'treatmentName' => 'XRAY',
					'treatmentCost' => 1200.00,
					'paymentId' => 3,
					'paymentDate' => '2018-01-15',
					'paymentAmount' => 425.00,
				],
				[ 	//row #2
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-11',
					'treatmentName' => 'XRAY',
					'treatmentCost' => 1200.00,
					'paymentId' => 7,
					'paymentDate' => '2018-01-14',
					'paymentAmount' => 525.00,
				],
				[ 	//row #3
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-12',
					'treatmentName' => 'MRI',
					'treatmentCost' => 3600.00,
					'paymentId' => 11,
					'paymentDate' => '2018-01-19',
					'paymentAmount' => 356.00,
				],
				[ 	//row #4
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-12',
					'treatmentName' => 'MRI',
					'treatmentCost' => 3600.00,
					'paymentId' => 18,
					'paymentDate' => '2018-01-17',
					'paymentAmount' => 820.00,
				],
				[ 	//row #5
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-12',
					'treatmentName' => 'MRI',
					'treatmentCost' => 3600.00,
					'paymentId' => 25,
					'paymentDate' => '2018-01-16',
					'paymentAmount' => 781.00,
				],
				[ 	//row #6
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-12',
					'treatmentName' => 'MRI',
					'treatmentCost' => 3600.00,
					'paymentId' => 31,
					'paymentDate' => '2018-01-15',
					'paymentAmount' => 100.00,
				],
				[ 	//row #7
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-10',
					'treatmentName' => 'Emergency Room',
					'treatmentCost' => 1000.00,
					'paymentId' => 44,
					'paymentDate' => '2018-01-16',
					'paymentAmount' => 650.00,
				],
				[ 	//row #8
					'patientId' => 1,
					'firstName' => 'John',
					'lastName' => 'Smith',
					'treatmentDate' => '2018-01-10',
					'treatmentName' => 'Emergency Room',
					'treatmentCost' => 1000.00,
					'paymentId' => 72,
					'paymentDate' => '2018-01-15',
					'paymentAmount' => 100.00,
				],
			];

			/* Looping through Original Array */
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

			/* Looping through New Array */
			foreach ($patientArray['Patient']['Treatments'] as $treatmentName => $treatmentInfo) {
				$tempArray['patientName'] = $patientArray['Patient']['firstName'];
				$tempArray['treatmentName'] = $treatmentName;
				$tempArray['treatmentCost'] = $treatmentInfo['treatmentCost'];
				$tempArray['amountPaid'] = 0;

				foreach ($treatmentInfo['Payments'] as $payNum => $payInfo) {
					$tempArray['amountPaid'] += $payInfo['amount']; 
				}

				$tempArray['remainingBalance'] = $tempArray['treatmentCost'] - $tempArray['amountPaid'];

				$treatmentArray[] = $tempArray;
			}/* End of loop */
		?>

		<?php
			$i = 0;

			foreach ($treatmentArray as $key => $value) {
				$class = 'row' . ($i % 2);
				$i++;
		?>
				<tr class="<?php echo $class ?>">
					<td> <?php echo $payNum ?></td>
					<td> <?php echo $value['patientName'] ?></td>
		            <td> <?php echo $value['treatmentName'] ?></td>
		            <td class="remain-bal"> $<?php echo $value['treatmentCost'] ?>.00</td>
		            <td class="remain-bal"> $<?php echo $value['amountPaid'] ?>.00</td>
		            <td class="remain-bal"> $<?php echo $value['remainingBalance'] ?>.00</td>	 
		        </tr>
		<?php        
	        }
	    ?>
	    </table>
	</body>
</html>