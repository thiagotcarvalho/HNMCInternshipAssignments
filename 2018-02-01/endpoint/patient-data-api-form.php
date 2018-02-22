<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Holy Name Medical Center - Patient Info</title>
		<link rel="stylesheet" type="text/css" href="http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-style.css">
	</head>

	<body>
		<div id="container">
			<header>
				<div id="header-company">
					Holy Name Medical Center
				</div>
				<div id="header-datetime">
					{Insert Date and Time}
				</div>
				<div id="header-pagename">
					<p class="title">Patient Info</p>
				</div>
			</header>
 
			<main>
				<!-- <?php
					/* Loop to Retrieve Patient Name */
					// foreach ($patientArray as $patientInfo) {
				?> -->
					<!-- Top Half of Form -->
					<div class="row" id="patient-name">
						<div class="caption">NAME:</div>
						<!-- <?php // print_r($patientInfo['firstName'].' '.$patientInfo['lastName']); ?> -->
					</div>
					<div class="row">
						<div class="caption">ADDRESS:</div> 718 Main Street, Teaneck, NJ
					</div>
					<div class="row">
						<div class="col space">
							<div class="caption">PHONE:</div> 201-833-3124
						</div>
						<div class="col">
							<div class="caption">CELL:</div> 973-301-4567
						</div>
					</div>
					<div class="row">
						<div class="caption">MEDICAL RECORD #:</div> 123-456-789
					</div>
					<!-- End of Top Half of Form-->
				<!-- <?php // } 
					/*Loop for Patient Name End */
				?> -->

				<!-- <?php
					/* Loop to Retrieve Treatment Information */
					// foreach ($patientArray['Patient']['Treatments'] as $treatmentName) {
				?> -->
						<!-- Bottom Half of Form -->
						<div class="row">
							<div id="override" class="caption">TREATMENTS</div>
						</div>

						<div id="form-bottom"></div>

						<!-- <div class="row">
							<div class="col space">
								<div class="caption">DATE:</div><div id="treat-date"></div> -->
								<!-- <?php // print_r($treatmentName['treatmentDate']); ?> -->
							<!-- </div>
							<div class="col space">
								<div class="caption">NAME:</div><div id="treat-name"></div> -->
								<!-- <?php //print_r($treatmentName['treatmentName']); ?> -->
							<!-- </div>
							<div class="col">
								<div class="caption">COST:</div><div id="treat-cost"></div> -->
								<!-- <?php //print_r($treatmentName['treatmentCost']); ?> -->
							<!-- </div>
						</div> -->

						<!-- Blank Row || Create distance between previous row and table -->
						<!-- <div class="row">
							<p></p>
						</div> -->
						<!-- End Blank Row -->
						<!-- <div class="row"> -->
							<!-- Blank Column || Offset table from left side -->
							<!-- <div class="col half">
								<p></p>
							</div> -->
							<!-- End Blank Column -->

							<!-- Table with Treatment Info -->
							<!-- <table id="pay-table" class="half">
								<tr>
									<th colspan="3">Payments</th>
								</tr>
								<tr>
									<th>Date</th>
									<th>Amount</th>
									<th>Balance</th>
								</tr> -->

								<!-- <?php
									/* Loop to Retrieve Payment Information */
									// $tempArray['amountPaid'] = 0;

									// foreach ($treatmentName['Payments'] as $paymentNum) {
									// 	$tempArray['amountPaid'] += $paymentNum['amount'];

									// 	$tempArray['remainingBalance'] = $treatmentName['treatmentCost'] - $tempArray['amountPaid'];
								?> -->
										<!-- <tr>
											<td id="pay-date">01/01/2018 -->
												<!-- <?php //print_r($paymentNum['paymentDate']) ?> -->	
											<!-- </td>
											<td id="pay-amt" class="currency">$0.00 -->
												<!-- <?php //print_r($paymentNum['amount']) ?> -->
											<!-- </td>
											<td id="pay-bal" class="currency">$0.00 -->
												<!-- <?php //print_r($tempArray['remainingBalance']) ?> -->
											<!-- </td>
										</tr> -->
									<!-- <?php //} ?> -->
									<!-- End Payment Loop -->
							<!-- </table> -->
							<!-- End of Table with Treatment Info -->
						<!-- </div> -->
						<!-- End of Bottom Half of Form -->
					<!-- <?php //} ?> -->
					<!-- End Treatment Loop -->
			</main>

			<footer>
				<div id="amt-paid"></div>
				<div id='tot-bal'></div>
				<br />
				Logged User: Thiago Carvalho, IP: 122.16.23.15
			</footer>

			<script src="http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-populate.js"></script>
			<script src="http://localhost/thiago/hnmc_assignments/2018-02-01/endpoint/patient-data-clock.js"></script>
		</div>
	</body>
</html>